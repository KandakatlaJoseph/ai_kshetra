    <?php
    include 'db.php';

    $message = "";
    $status  = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Safely read & escape inputs
        $member1_name    = $conn->real_escape_string($_POST['member1_name'] ?? '');
        $member1_email   = $conn->real_escape_string($_POST['member1_email'] ?? '');
        $member1_phone   = $conn->real_escape_string($_POST['member1_phone'] ?? '');
        $member1_college = $conn->real_escape_string($_POST['member1_college'] ?? '');
        $member1_roll    = $conn->real_escape_string($_POST['member1_roll'] ?? '');
        
        $member2_name    = $conn->real_escape_string($_POST['member2_name'] ?? '');
        $member2_email   = $conn->real_escape_string($_POST['member2_email'] ?? '');
        $member2_phone   = $conn->real_escape_string($_POST['member2_phone'] ?? '');
        $member2_college = $conn->real_escape_string($_POST['member2_college'] ?? '');
        $member2_roll    = $conn->real_escape_string($_POST['member2_roll'] ?? '');

        $member3_name    = $conn->real_escape_string($_POST['member3_name'] ?? '');
        $member3_email   = $conn->real_escape_string($_POST['member3_email'] ?? '');
        $member3_phone   = $conn->real_escape_string($_POST['member3_phone'] ?? '');
        $member3_college = $conn->real_escape_string($_POST['member3_college'] ?? '');
        $member3_roll    = $conn->real_escape_string($_POST['member3_roll'] ?? '');

        $member4_name    = $conn->real_escape_string($_POST['member4_name'] ?? '');
        $member4_email   = $conn->real_escape_string($_POST['member4_email'] ?? '');
        $member4_phone   = $conn->real_escape_string($_POST['member4_phone'] ?? '');
        $member4_college = $conn->real_escape_string($_POST['member4_college'] ?? '');
        $member4_roll    = $conn->real_escape_string($_POST['member4_roll'] ?? '');

        // 1) DUPLICATE CHECK based on leader phone (member1_phone)
        $checkSql = "
            SELECT COUNT(*) AS c 
            FROM registrations_build_with_ai
            WHERE member1_phone = '$member1_phone'
        ";
        $checkRes = $conn->query($checkSql);
        $checkRow = $checkRes ? $checkRes->fetch_assoc() : ['c' => 0];

        if ((int)$checkRow['c'] > 0) {
            // Already registered
            $message = "This phone number is already registered for Build with AI.";
            $status  = "error";
        } else {
            // 2) INSERT if not duplicate
            $sql = "
                INSERT INTO registrations_build_with_ai
                (
                    member1_name, member1_email, member1_phone, member1_college, member1_roll,
                    member2_name, member2_email, member2_phone, member2_college, member2_roll,
                    member3_name, member3_email, member3_phone, member3_college, member3_roll,
                    member4_name, member4_email, member4_phone, member4_college, member4_roll
                )
                VALUES
                (
                    '$member1_name', '$member1_email', '$member1_phone', '$member1_college', '$member1_roll',
                    '$member2_name', '$member2_email', '$member2_phone', '$member2_college', '$member2_roll',
                    '$member3_name', '$member3_email', '$member3_phone', '$member3_college', '$member3_roll',
                    '$member4_name', '$member4_email', '$member4_phone', '$member4_college', '$member4_roll'
                )
            ";

            if ($conn->query($sql) === TRUE) {
                $message = "Registration successful! Good luck for Build with AI.";
                $status  = "success";
            } else {
                // If UNIQUE constraint still triggers (race condition etc.)
                if ($conn->errno == 1062) {
                    $message = "This phone number is already registered for Build with AI.";
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

            <a href="index.html#home"   class="menu-item">Home</a>
            <a href="index.html#events" class="menu-item">Events</a>
            <a href="about.html"        class="menu-item">About</a>
            <a href="index.html#contact" class="menu-item">Contact</a>
        </nav>
    </header>

    <div class="container">
        <div class="reg-container">
            <h2 class="reg-title">Register for Build with AI</h2>

            <?php if ($message): ?>
                <div class="alert <?= $status === 'success' ? 'success' : 'error' ?>">
                    <?= htmlspecialchars($message) ?>
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
