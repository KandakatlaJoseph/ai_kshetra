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
    
    $member2_name = $_POST['member2_name'];
    $member2_email = $_POST['member2_email'];
    $member2_phone = $_POST['member2_phone'];
    $member2_college = $_POST['member2_college'];
    $member2_roll = $_POST['member2_roll'];

    $member3_name = isset($_POST['member3_name']) ? $_POST['member3_name'] : null;
    $member3_email = isset($_POST['member3_email']) ? $_POST['member3_email'] : null;
    $member3_phone = isset($_POST['member3_phone']) ? $_POST['member3_phone'] : null;
    $member3_college = isset($_POST['member3_college']) ? $_POST['member3_college'] : null;
    $member3_roll = isset($_POST['member3_roll']) ? $_POST['member3_roll'] : null;

    $member4_name = isset($_POST['member4_name']) ? $_POST['member4_name'] : null;
    $member4_email = isset($_POST['member4_email']) ? $_POST['member4_email'] : null;
    $member4_phone = isset($_POST['member4_phone']) ? $_POST['member4_phone'] : null;
    $member4_college = isset($_POST['member4_college']) ? $_POST['member4_college'] : null;
    $member4_roll = isset($_POST['member4_roll']) ? $_POST['member4_roll'] : null;

    $sql = "INSERT INTO registrations_build_with_ai (member1_name, member1_email, member1_phone, member1_college, member1_roll, member2_name, member2_email, member2_phone, member2_college, member2_roll, member3_name, member3_email, member3_phone, member3_college, member3_roll, member4_name, member4_email, member4_phone, member4_college, member4_roll)
            VALUES ('$member1_name', '$member1_email', '$member1_phone', '$member1_college', '$member1_roll', '$member2_name', '$member2_email', '$member2_phone', '$member2_college', '$member2_roll', '$member3_name', '$member3_email', '$member3_phone', '$member3_college', '$member3_roll', '$member4_name', '$member4_email', '$member4_phone', '$member4_college', '$member4_roll')";

    if ($conn->query($sql) === TRUE) {
        $message = "Registration successful! Good luck for Build with AI.";
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
    <title>Register - Build with AI</title>
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
        .member-section {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            margin-top: 20px;
        }
        .hidden { display: none; }
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
            <h2 class="reg-title">Register for Build with AI</h2>
            <?php if ($message): ?>
                <div style="text-align: center; margin-bottom: 20px; color: <?php echo $status == 'success' ? '#00f5d4' : '#ff0055'; ?>;">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <h3>Member 1 (Leader)</h3>
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

                <h3>Member 2</h3>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="member2_name" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="member2_email" required>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="tel" name="member2_phone" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>College Name</label>
                        <input type="text" name="member2_college" required>
                    </div>
                    <div class="form-group">
                        <label>Roll No</label>
                        <input type="text" name="member2_roll" required>
                    </div>
                </div>

                <div id="member3-section" class="member-section hidden">
                    <h3>Member 3</h3>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="member3_name">
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="member3_email">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="tel" name="member3_phone">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>College Name</label>
                            <input type="text" name="member3_college">
                        </div>
                        <div class="form-group">
                            <label>Roll No</label>
                            <input type="text" name="member3_roll">
                        </div>
                    </div>
                </div>

                <div id="member4-section" class="member-section hidden">
                    <h3>Member 4</h3>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="member4_name">
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="member4_email">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="tel" name="member4_phone">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>College Name</label>
                            <input type="text" name="member4_college">
                        </div>
                        <div class="form-group">
                            <label>Roll No</label>
                            <input type="text" name="member4_roll">
                        </div>
                    </div>
                </div>

                <button type="button" id="add-member-btn" class="btn btn-secondary" style="width: 100%; margin-bottom: 20px;">Add Member</button>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Submit Registration</button>
            </form>
        </div>
    </div>

    <script>
        const addBtn = document.getElementById('add-member-btn');
        const member3 = document.getElementById('member3-section');
        const member4 = document.getElementById('member4-section');
        let count = 2;

        addBtn.addEventListener('click', () => {
            if (count === 2) {
                member3.classList.remove('hidden');
                count++;
            } else if (count === 3) {
                member4.classList.remove('hidden');
                count++;
                addBtn.style.display = 'none';
            }
        });
    </script>
</body>
</html>
