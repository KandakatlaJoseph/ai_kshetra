<?php
include 'db.php';

$message = "";
$status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $participant_name = $_POST['participant_name'];
    $participant_email = $_POST['participant_email'];
    $participant_phone = $_POST['participant_phone'];
    $participant_college = $_POST['participant_college'];
    $participant_roll = $_POST['participant_roll'];

    $sql = "INSERT INTO registrations_dream_frame (participant_name, participant_email, participant_phone, participant_college, participant_roll)
            VALUES ('$participant_name', '$participant_email', '$participant_phone', '$participant_college', '$participant_roll')";

    if ($conn->query($sql) === TRUE) {
        $message = "Registration successful! See you at DreamFrame.";
        $status = "success";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
        $status = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - DreamFrame</title>
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
<a href="index.html#home" class="menu-item">Home</a>
<a href="index.html#events" class="menu-item">Events</a>
<a href="about.html" class="menu-item">About</a>
<a href="index.html#contact" class="menu-item">Contact</a>

    </nav>

</header>

    <div class="container">
        <div class="reg-container">
            <h2 class="reg-title">Register for DreamFrame</h2>
            <?php if ($message): ?>
                <div style="text-align: center; margin-bottom: 20px; color: <?php echo $status == 'success' ? '#00f5d4' : '#ff0055'; ?>;">
                    <?php echo $message; ?>
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
