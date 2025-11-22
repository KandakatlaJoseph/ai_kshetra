<?php
include 'db.php';

$message = "";
$status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $member1_name = $_POST['member1_name'];
    $member1_email = $_POST['member1_email'];
    $member1_phone = $_POST['member1_phone'];
    $member1_college = $_POST['member1_college'];
    $member1_roll = $_POST['member1_roll'];
    
    $member2_name = isset($_POST['member2_name']) ? $_POST['member2_name'] : null;
    $member2_email = isset($_POST['member2_email']) ? $_POST['member2_email'] : null;
    $member2_phone = isset($_POST['member2_phone']) ? $_POST['member2_phone'] : null;
    $member2_college = isset($_POST['member2_college']) ? $_POST['member2_college'] : null;
    $member2_roll = isset($_POST['member2_roll']) ? $_POST['member2_roll'] : null;

    $sql = "INSERT INTO registrations_codewarz (member1_name, member1_email, member1_phone, member1_college, member1_roll, member2_name, member2_email, member2_phone, member2_college, member2_roll)
            VALUES ('$member1_name', '$member1_email', '$member1_phone', '$member1_college', '$member1_roll', '$member2_name', '$member2_email', '$member2_phone', '$member2_college', '$member2_roll')";

    if ($conn->query($sql) === TRUE) {
        $message = "Registration successful! Get ready for CodeWarz.";
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
    <title>Register - CodeWarz</title>
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
    <style>
        .reg-container {
            max-width: 800px;
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
        <div class="container">
            <div class="logo">AI KSHETRA</div>
            <nav class="nav">
                <a href="index.php">Home</a>
                <a href="index.php#events">Events</a>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="reg-container">
            <h2 class="reg-title">Register for CodeWarz</h2>
            <?php if ($message): ?>
                <div style="text-align: center; margin-bottom: 20px; color: <?php echo $status == 'success' ? '#00f5d4' : '#ff0055'; ?>;">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <h3>Participant 1</h3>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="member1_name" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="member1_email" required>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="tel" name="member1_phone" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>College Name</label>
                        <input type="text" name="member1_college" required>
                    </div>
                    <div class="form-group">
                        <label>Roll No</label>
                        <input type="text" name="member1_roll" required>
                    </div>
                </div>

                <h3>Participant 2 (Optional)</h3>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="member2_name">
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="member2_email">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="tel" name="member2_phone">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>College Name</label>
                        <input type="text" name="member2_college">
                    </div>
                    <div class="form-group">
                        <label>Roll No</label>
                        <input type="text" name="member2_roll">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%;">Submit Registration</button>
            </form>
        </div>
    </div>
</body>
</html>
