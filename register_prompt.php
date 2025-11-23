<?php
include 'db.php';

$message = "";
$status  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $participant_name    = $conn->real_escape_string($_POST['participant_name'] ?? '');
    $participant_email   = $conn->real_escape_string($_POST['participant_email'] ?? '');
    $participant_phone   = $conn->real_escape_string($_POST['participant_phone'] ?? '');
    $participant_college = $conn->real_escape_string($_POST['participant_college'] ?? '');
    $participant_roll    = $conn->real_escape_string($_POST['participant_roll'] ?? '');

    // 1) duplicate check using participant_phone
    $checkSql = "
        SELECT COUNT(*) AS c
        FROM registrations_prompt_craft
        WHERE participant_phone = '$participant_phone'
    ";
    $checkRes = $conn->query($checkSql);
    $checkRow = $checkRes ? $checkRes->fetch_assoc() : ['c' => 0];

    if ((int)$checkRow['c'] > 0) {
        $message = "This phone number is already registered for PromptCraft.";
        $status  = "error";
    } else {
        $sql = "
            INSERT INTO registrations_prompt_craft
            (participant_name, participant_email, participant_phone, participant_college, participant_roll)
            VALUES
            ('$participant_name', '$participant_email', '$participant_phone', '$participant_college', '$participant_roll')
        ";

        if ($conn->query($sql) === TRUE) {
            $message = "Registration successful! Welcome to PromptCraft.";
            $status  = "success";
        } else {
            if ($conn->errno == 1062) {
                $message = "This phone number is already registered for PromptCraft.";
                $status  = "error";
            } else {
                $message = "Error while saving your registration. Please try again later.";
                $status  = "error";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - PromptCraft</title>
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
    <style>
        .reg-container {
            max-width: 600px;
            margin: 120px auto 50px;
            padding: 40px;
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 12px;
            backdrop-filter: blur(10px);
        }
        .reg-title {
            font-family: var(--font-heading);
            text-align: center;
            margin-bottom: 30px;
            color: var(--accent-secondary);
        }
        .form-row {
            display: flex;
            gap: 20px;
        }
        .form-row .form-group {
            flex: 1;
        }
        .alert {
            padding: 12px 18px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-weight: 600;
        }
        .alert.success {
            background: rgba(0,255,150,0.15);
            border: 1px solid #00ff9a;
            color: #00ff9a;
        }
        .alert.error {
            background: rgba(255,80,80,0.15);
            border: 1px solid #ff5050;
            color: #ff5050;
        }
    </style>
</head>
<body>
<header class="header">
    <nav class="menu nav-menu">
        <input type="checkbox" class="menu-open" id="menu-open" />

        <label class="menu-open-button" for="menu-open">
            <span class="lines line-1"></span>
            <span class="lines line-2"></span>
            <span class="lines line-3"></span>
        </label>

        <a href="index.html#home"    class="menu-item">Home</a>
        <a href="index.html#events"  class="menu-item">Events</a>
        <a href="about.html"         class="menu-item">About</a>
        <a href="index.html#contact" class="menu-item">Contact</a>
    </nav>
</header>

<div class="container">
    <div class="reg-container">
        <h2 class="reg-title">Register for PromptCraft</h2>

        <?php if ($message): ?>
            <div class="alert <?= $status === 'success' ? 'success' : 'error' ?>">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="participant_name" required>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="participant_email" required>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="tel" name="participant_phone" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>College Name</label>
                    <input type="text" name="participant_college" required>
                </div>
                <div class="form-group">
                    <label>Roll No</label>
                    <input type="text" name="participant_roll" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Submit Registration</button>
        </form>
    </div>
</div>
</body>
</html>
