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
    $member1_name    = clean_input($_POST['member1_name'] ?? '');
    $member1_email   = clean_input($_POST['member1_email'] ?? '');
    $member1_phone   = clean_input($_POST['member1_phone'] ?? '');
    $member1_college = clean_input($_POST['member1_college'] ?? '');
    $member1_branch  = clean_input($_POST['member1_branch'] ?? '');
    $member1_roll    = clean_input($_POST['member1_roll'] ?? '');
    
    $member2_name    = clean_input($_POST['member2_name'] ?? '');
    $member2_email   = clean_input($_POST['member2_email'] ?? '');
    $member2_phone   = clean_input($_POST['member2_phone'] ?? '');
    $member2_college = clean_input($_POST['member2_college'] ?? '');
    $member2_branch  = clean_input($_POST['member2_branch'] ?? '');
    $member2_roll    = clean_input($_POST['member2_roll'] ?? '');

    // Basic Validation
    if (empty($member1_name) || empty($member1_email) || empty($member1_phone) || empty($member1_branch) || empty($member2_name) || empty($member2_branch)) {
        header("Location: status_code.php?status=error");
        exit();
    }

    // Validate Phone Numbers (Must be exactly 10 digits)
    if (!preg_match('/^\d{10}$/', $member1_phone) || !preg_match('/^\d{10}$/', $member2_phone)) {
        $message = "Phone numbers must be exactly 10 digits.";
        // Ideally redirect with error, but for now using generic error status or just exit
        // Since we don't have a specific error code for invalid phone, we'll use 'error'
        header("Location: status_code.php?status=error"); 
        exit();
    }

    // Check for duplicate registration (using Leader's phone)
    $stmt = $conn->prepare("SELECT id FROM registrations_codewarz WHERE member1_phone = ?");
    $stmt->bind_param("s", $member1_phone);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->close();
        header("Location: status_code.php?status=exists");
        exit();
    }
    $stmt->close();

    // Insert Data using Prepared Statement
    $sql = "INSERT INTO registrations_codewarz 
            (member1_name, member1_email, member1_phone, member1_college, member1_branch, member1_roll,
             member2_name, member2_email, member2_phone, member2_college, member2_branch, member2_roll)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("ssssssssssss", 
            $member1_name, $member1_email, $member1_phone, $member1_college, $member1_branch, $member1_roll,
            $member2_name, $member2_email, $member2_phone, $member2_college, $member2_branch, $member2_roll
        );

        if ($stmt->execute()) {
            header("Location: status_code.php?status=success");
        } else {
            error_log("Execute failed: " . $stmt->error);
            header("Location: status_code.php?status=error");
        }
        $stmt->close();
    } else {
        error_log("Prepare failed: " . $conn->error);
        header("Location: status_code.php?status=error");
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
        <h2 class="reg-title">Register for CodeWarz</h2>

        <?php if ($message): ?>
            <div class="alert <?= $status === 'success' ? 'success' : 'error' ?>">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <h3>Participant 1 (Leader)</h3>
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
                    <input type="tel" name="member1_phone" pattern="[0-9]{10}" maxlength="10" title="Please enter exactly 10 digits" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>College Name</label>
                    <input type="text" name="member1_college" required>
                </div>
                <div class="form-group">
                    <label>Branch</label>
                    <select name="member1_branch" required>
                        <option value="" disabled selected>Select Branch</option>
                        <?php render_branch_options($branches); ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Roll No</label>
                <input type="text" name="member1_roll" required>
            </div>

            <h3>Participant 2</h3>
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
                    <input type="tel" name="member2_phone" pattern="[0-9]{10}" maxlength="10" title="Please enter exactly 10 digits" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>College Name</label>
                    <input type="text" name="member2_college" required>
                </div>
                <div class="form-group">
                    <label>Branch</label>
                    <select name="member2_branch" required>
                        <option value="" disabled selected>Select Branch</option>
                        <?php render_branch_options($branches); ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Roll No</label>
                <input type="text" name="member2_roll" required>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Submit Registration</button>
        </form>
    </div>
</div>
</body>
</html>
