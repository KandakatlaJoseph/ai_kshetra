<?php
session_start();

// If already logged in, go directly to dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: admin_dashboard.php');
    exit;
}

// Change these to whatever you want
const ADMIN_USER = 'admin';
const ADMIN_PASS = 'ai_kshetra_2025';

$error = '';

// Optional: timeout message
if (isset($_GET['timeout']) && $_GET['timeout'] == 1) {
    $error = 'Session expired. Please log in again.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = $_POST['username'] ?? '';
    $p = $_POST['password'] ?? '';

    if ($u === ADMIN_USER && $p === ADMIN_PASS) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['LAST_ACTIVE'] = time();
        header('Location: admin_dashboard.php');
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login – AI Kshetra</title>
    <link rel="stylesheet" href="static/css/style.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            max-width: 400px;
            width: 100%;
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 12px;
            padding: 30px;
            backdrop-filter: blur(10px);
        }
        .login-card h2 {
            font-family: var(--font-heading);
            text-align: center;
            margin-bottom: 20px;
        }
        .login-card .form-group {
            margin-bottom: 18px;
        }
        .login-card label {
            display: block;
            margin-bottom: 5px;
            color: var(--text-secondary);
        }
        .login-card input {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid var(--card-border);
            background: rgba(255,255,255,0.03);
            color: var(--text-primary);
        }
        .error-msg {
            color: #ff5577;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="login-card">
    <h2>Admin Login</h2>

    <?php if ($error): ?>
        <div class="error-msg"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required autocomplete="off">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary" style="width:100%;margin-top:10px;">
            Login
        </button>
    </form>
</div>

</body>
</html>
