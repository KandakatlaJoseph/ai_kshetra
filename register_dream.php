<?php
include 'db.php';

$message = "";
$status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Helper function to sanitize input
    function clean_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // Collect and sanitize inputs
    $participant_name    = clean_input($_POST['participant_name'] ?? '');
    $participant_email   = clean_input($_POST['participant_email'] ?? '');
    $participant_phone   = clean_input($_POST['participant_phone'] ?? '');
    $participant_college = clean_input($_POST['participant_college'] ?? '');
    $participant_branch  = clean_input($_POST['participant_branch'] ?? '');
    $participant_roll    = clean_input($_POST['participant_roll'] ?? '');

    // Basic Validation
    if (empty($participant_name) || empty($participant_email) || empty($participant_phone) || empty($participant_branch)) {
        header("Location: status_dream.php?status=error");
        exit();
    }

    // Validate Phone Number (Must be exactly 10 digits)
    if (!preg_match('/^\d{10}$/', $participant_phone)) {
        header("Location: status_dream.php?status=error");
        exit();
    }

    // Check for duplicate registration
    $stmt = $conn->prepare("SELECT id FROM registrations_dream_frame WHERE participant_phone = ?");
    $stmt->bind_param("s", $participant_phone);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->close();
        header("Location: status_dream.php?status=exists");
        exit();
    }
    $stmt->close();

    // Insert Data using Prepared Statement
    $sql = "INSERT INTO registrations_dream_frame 
            (participant_name, participant_email, participant_phone, participant_college, participant_branch, participant_roll)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("ssssss", 
            $participant_name, $participant_email, $participant_phone, $participant_college, $participant_branch, $participant_roll
        );

        if ($stmt->execute()) {
            header("Location: status_dream.php?status=success");
        } else {
            error_log("Execute failed: " . $stmt->error);
            header("Location: status_dream.php?status=error");
        }
        $stmt->close();
    } else {
        error_log("Prepare failed: " . $conn->error);
        header("Location: status_dream.php?status=error");
    }
    exit();
}

$branches = [
    "CSE (AI & ML)", "Computer Science and Engineering (CSE)", "CSE (Data Science)", "CSE (IoT)",
    "Computer Science & Business Systems (CSBS)", "Artificial Intelligence & Data Science (AI & DS)",
    "Information Technology (IT)", "Electronics and Communication Engineering (ECE)",
    "Electrical and Electronics Engineering (EEE)", "Mechanical Engineering (ME)", "Civil Engineering",
    "Chemical Engineering", "Mechatronics Engineering", "Biomedical Engineering", "Agricultural Engineering",
    "Biomedical Science", "Business Administration (BBA)", "MBA (All Specializations)",
    "Computer Applications (BCA / MCA)", "B.Sc (Computer Science, Mathematics, Physics, Chemistry, Life Sciences)",
    "M.Tech", "Other"
];

function render_branch_options($branches) {
    foreach ($branches as $branch) {
        echo "<option value=\"" . htmlspecialchars($branch) . "\">" . htmlspecialchars($branch) . "</option>";
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
        select {
            width: 100%;
            padding: 15px;
            border-radius: 4px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.05);
            color: var(--text-primary);
            font-family: var(--font-body);
            transition: all 0.3s;
        }
        select:focus {
            outline: none;
            border-color: var(--accent-secondary);
            box-shadow: 0 0 15px rgba(0, 245, 212, 0.2);
        }
        option {
            background: #0a0a12;
            color: var(--text-primary);
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
        <h2 class="reg-title">Register for DreamFrame</h2>

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
                    <input type="tel" name="participant_phone" pattern="[0-9]{10}" maxlength="10" title="Please enter exactly 10 digits" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>College Name</label>
                    <input type="text" name="participant_college" required>
                </div>
                <div class="form-group">
                    <label>Branch</label>
                    <select name="participant_branch" required>
                        <option value="" disabled selected>Select Branch</option>
                        <?php render_branch_options($branches); ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Roll No</label>
                <input type="text" name="participant_roll" required>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Submit Registration</button>
        </form>
    </div>
</div>
</body>
</html>
