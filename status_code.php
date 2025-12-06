<?php
$status = $_GET['status'] ?? '';
$message = '';
$isSuccess = false;

if ($status === 'success') {
    $message = "Registration Successful! Welcome to CodeWarz.";
    $isSuccess = true;
} elseif ($status === 'error') {
    $message = "Registration Failed. Please try again.";
} elseif ($status === 'exists') {
    $message = "You are already registered for this event.";
} else {
    $message = "Unknown Status.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Status - CodeWarz</title>
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
    <style>
        .status-container {
            max-width: 600px;
            margin: 150px auto 50px;
            padding: 40px;
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 12px;
            backdrop-filter: blur(10px);
            text-align: center;
        }
        .status-icon {
            font-size: 4rem;
            margin-bottom: 20px;
        }
        .status-title {
            font-family: var(--font-heading);
            font-size: 2rem;
            margin-bottom: 15px;
            color: #fff;
        }
        .status-message {
            color: var(--text-secondary);
            font-size: 1.1rem;
            margin-bottom: 30px;
        }
        .whatsapp-btn {
            background-color: #25D366;
            color: white;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 1.1rem;
        }
        .whatsapp-btn:hover {
            background-color: #20bd5a;
            color: white;
            box-shadow: 0 0 20px rgba(37, 211, 102, 0.4);
        }
        .home-link {
            display: block;
            margin-top: 20px;
            color: var(--accent-secondary);
            text-decoration: none;
        }
        .home-link:hover {
            text-decoration: underline;
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
        <div class="status-container">
            <div class="status-icon">
                <?php echo $isSuccess ? '🎉' : '⚠️'; ?>
            </div>
            <h2 class="status-title"><?php echo $isSuccess ? 'Success!' : 'Notice'; ?></h2>
            <p class="status-message"><?php echo htmlspecialchars($message); ?></p>

            <?php if ($isSuccess): ?>
                <a href="#" class="btn whatsapp-btn" target="_blank">
                    <span>Join WhatsApp Group</span>
                </a>
                <p style="margin-top: 15px; font-size: 0.9rem; color: var(--text-secondary);">
                    Stay updated with event announcements!
                </p>
            <?php endif; ?>

            <a href="index.html" class="home-link">← Back to Home</a>
        </div>
    </div>
</body>
</html>
