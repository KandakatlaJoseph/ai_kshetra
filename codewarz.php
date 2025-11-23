<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CodeWarz – AI Kshetra</title>
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/events_styles.css">
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

<main>

    <section class="hero event-hero">
        <div class="container">
            <span class="hero-subtitle">AI Kshetra Event</span>
            <h1 class="hero-title">CodeWarz</h1>
            <p class="hero-tagline">Competitive Coding & Algorithm Challenges</p>
        </div>
    </section>

    <section class="events">
        <div class="container event-details-page">

            <p class="event-desc" style="max-width: 800px; margin: 0 auto 30px; text-align:center;">
                CodeWarz is a multi-round competitive programming event testing algorithmic thinking,
                debugging ability, logic development, accuracy, and speed.
            </p>

            <div class="event-info-grid">
                <div class="event-info-box">
                    <h3>Event Type</h3>
                    <p>Competitive Coding Challenge</p>
                </div>
                <div class="event-info-box">
                    <h3>Team Size</h3>
                    <p>2 Members</p>
                </div>
                <div class="event-info-box">
                    <h3>Mode</h3>
                    <p>Offline</p>
                </div>
            </div>

            <div class="event-detail-block">
                <h2>Event Structure</h2>

                <h3>Preliminary Round – MCQ Logic Test</h3>
                <ul>
                    <li>Tests programming logic, time complexity, and reasoning.</li>
                    <li>Top teams qualify for the main challenge rounds.</li>
                </ul>

                <h3>Main Rounds</h3>
                <ul>
                    <li><strong>Coding Round</strong> – Solve 5 problems of rising difficulty.</li>
                    <li><strong>Fill the Algorithm</strong> – Complete missing logic segments.</li>
                    <li><strong>Rapid Fire</strong> – Fast recall technical quiz.</li>
                </ul>
            </div>

            <div class="event-detail-block">
                <h2>Evaluation Criteria</h2>
                <ul>
                    <li>Time efficiency and correctness</li>
                    <li>Optimization and code structure</li>
                    <li>Debugging accuracy</li>
                    <li>Problem-solving strategy</li>
                </ul>
            </div>

            <div class="event-detail-block" style="text-align:center; margin-top:40px;">
                <h2>Register for CodeWarz</h2>
                <p>Compete against the best and prove your coding mastery.</p>
                <a href="register_code.php" class="btn btn-primary"
                style="margin-top:20px; display:inline-block;">
                    Register Now
                </a>
            </div>

        </div>
    </section>

</main>
</body>
</html>
