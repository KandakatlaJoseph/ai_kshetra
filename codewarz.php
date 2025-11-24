<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CodeWarz – AI Kshetra</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/events_styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Orbitron:wght@400..900&display=swap"
        rel="stylesheet">

    <style>
        .event-hero {
            min-height: 55vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            background-image:
                url("static/css/main.jpg"),
                linear-gradient(rgba(0, 191, 255, 0.10) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 191, 255, 0.10) 1px, transparent 1px);
            background-size: cover, 50px 50px, 50px 50px;
            background-position: center;
            background-repeat: no-repeat, repeat, repeat;
        }

        .hero-cta-top {
            margin-top: 22px;
        }

        .event-section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 10px;
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .badge.upcoming { color: #ffcc66; border: 1px solid #ffcc66; }
        .badge.info { color: var(--accent-secondary); border: 1px solid var(--accent-secondary); }

        .table-wrapper { width: 100%; overflow-x: auto; }

        .event-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }
        .event-table th,
        .event-table td {
            border: 1px solid rgba(255,255,255,0.08);
            padding: 8px 12px;
        }
        .event-table th {
            background: rgba(255,255,255,0.03);
            font-weight: 600;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
            margin-top: 15px;
        }

        .gallery-item.placeholder {
            background: radial-gradient(circle at top, rgba(157,78,221,0.25), transparent 60%);
            min-height: 140px;
            border-radius: 10px;
            border: 1px solid rgba(255,255,255,0.08);
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--text-secondary);
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

<main>

<section class="hero event-hero">
    <div class="container">
        <span class="hero-subtitle">AI Kshetra Event</span>
        <h1 class="hero-title">CodeWarz</h1>
        <p class="hero-tagline">Competitive Coding &amp; Algorithm Challenges</p>

        <a href="register_code.php" class="btn btn-primary hero-cta-top">
            Register Now
        </a>
    </div>
</section>

<section class="events">
    <div class="container event-details-page">

        <p class="event-desc" style="max-width: 800px; margin: 0 auto 30px; text-align:center;">
            <strong>CodeWarz</strong> is a multi-round competitive programming battle that tests algorithmic thinking,
            debugging skills, logic development, accuracy and speed under pressure.
        </p>

        <div class="event-info-grid">
            <div class="event-info-box">
                <h3>Event Type</h3>
                <p>Competitive Coding Challenge</p>
            </div>
            <div class="event-info-box">
                <h3>Participation</h3>
                <p>2 Members (Duo)</p>
            </div>
            <div class="event-info-box">
                <h3>Mode</h3>
                <p>Offline, On Campus</p>
            </div>
        </div>

        <div class="event-detail-block">
            <h2>Event Structure</h2>

            <h3>Preliminary Round – Logic &amp; MCQ Test</h3>
            <ul>
                <li>Objective and short-answer questions on C/C++/Java/Python basics, algorithms and time complexity.</li>
                <li>Focuses on logic, patterns, and debugging rather than rote memorization.</li>
                <li>Top-scoring teams qualify for the main rounds.</li>
            </ul>

            <h3>Main Rounds</h3>
            <ul>
                <li><strong>Coding Round</strong> – Solve a set of programming problems of increasing difficulty
                    within the given time.</li>
                <li><strong>Fix the Bug / Fill the Algorithm</strong> – Given partial or buggy code, participants must
                    identify logic errors and correct/complete the solution.</li>
                <li><strong>Rapid Fire (Optional Round)</strong> – Quick technical quiz based on algorithms,
                    data structures and output prediction.</li>
            </ul>
        </div>

        <div class="event-detail-block">
            <h2>Evaluation Criteria</h2>
            <ul>
                <li>Correctness of solutions and number of problems solved</li>
                <li>Time taken to arrive at the solution</li>
                <li>Quality of logic and optimisation (time &amp; space)</li>
                <li>Debugging skills and ability to handle edge cases</li>
                <li>Team coordination and strategy</li>
            </ul>
        </div>

        <div class="event-detail-block">
            <h2>Rules &amp; Guidelines</h2>
            <ul>
                <li>Each team must consist of exactly two members.</li>
                <li>Only the permitted languages and compilers in the lab may be used.</li>
                <li>Internet access and external code templates are strictly not allowed.</li>
                <li>Use of AI coding assistants is not permitted unless explicitly allowed by organisers.</li>
                <li>Any malpractice will result in immediate disqualification.</li>
                <li>Organisers and judges reserve the right to modify problems or scoring if required.</li>
            </ul>
        </div>

        <div class="event-detail-block">
            <h2>Prizes</h2>
            <ul>
                <li><strong>1st Prize:</strong> ₹3000</li>
                <li><strong>2nd Prize:</strong> ₹2000</li>
                <li><strong>3rd Prize:</strong> ₹1000</li>
            </ul>
        </div>

        <!-- Shortlisted Teams -->
        <section class="event-detail-block" id="round2">
            <div class="event-section-header">
                <h2>Shortlisted Teams</h2>
                <span class="badge upcoming">Will be updated after Prelims</span>
            </div>

            <div class="table-wrapper">
                <table class="event-table">
                    <thead>
                        <tr>
                            <th>S. No.</th>
                            <th>Participant 1 Name</th>
                            <th>Participant 2 Name</th>
                            <th>Leader Phone</th>
                            <th>College</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Later: fill from registrations_codewarz -->
                        <tr>
                            <td colspan="5" style="text-align:center; opacity:0.7;">
                                Shortlist not published yet.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Winners -->
        <section class="event-detail-block" id="winners">
            <div class="event-section-header">
                <h2>Winners</h2>
                <span class="badge upcoming">To be announced</span>
            </div>

            <div class="table-wrapper">
                <table class="event-table">
                    <thead>
                        <tr>
                            <th>Position</th>
                            <th>Participant 1 Name</th>
                            <th>Participant 2 Name</th>
                            <th>College</th>
                            <th>Prize</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Later: fill from results -->
                        <tr>
                            <td colspan="5" style="text-align:center; opacity:0.7;">
                                Results not announced yet.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Certificates -->
        <section class="event-detail-block" id="certificates">
            <div class="event-section-header">
                <h2>Certificates</h2>
                <span class="badge info">After Event</span>
            </div>

            <p>
                All participants who officially take part in <strong>CodeWarz</strong> will receive an
                <strong>e-certificate of participation</strong>.
            </p>
            <p>
                Teams that qualify in the later rounds and the prize-winning teams will additionally receive
                <strong>printed hardcopy certificates</strong> during the prize distribution.
            </p>
            <p>
                Links to download the e-certificates will be updated here after processing.
            </p>
        </section>

        <!-- Gallery -->
        <section class="event-detail-block" id="gallery">
            <div class="event-section-header">
                <h2>Event Gallery</h2>
                <span class="badge info">Photos</span>
            </div>

            <p>
                Glimpses of <strong>CodeWarz</strong> – intense problem solving, focused coding, and
                winner moments – will be showcased here after the event.
            </p>

            <div class="gallery-grid">
                <div class="gallery-item placeholder">Gallery coming soon</div>
                <div class="gallery-item placeholder">Highlights will appear here</div>
                <div class="gallery-item placeholder">Stay tuned!</div>
            </div>
        </section>

    </div>
</section>

</main>

</body>
</html>
