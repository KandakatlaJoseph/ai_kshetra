<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Build with AI – AI Kshetra</title>
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

        <!-- Use index.php#... here; if your file is index.html, just change it -->
 <a href="index.html#home" class="menu-item">Home</a>
<a href="index.html#events" class="menu-item">Events</a>
<a href="about.html" class="menu-item">About</a>
<a href="index.html#contact" class="menu-item">Contact</a>

    </nav>

</header>
<main>

    <!-- Event Hero Section (like About page hero) -->
    <section class="hero event-hero">
        <div class="container">
            <span class="hero-subtitle">AI Kshetra Event</span>
            <h1 class="hero-title">Build with AI</h1>
            <p class="hero-tagline">AI-powered Prototype Hackathon</p>
        </div>
    </section>

    <section class="events">
        <div class="container event-details-page">

            <!-- We ALREADY show event name in hero,
                 so we can change this to a subheading or remove it -->
            <!-- <h1 class="section-title">Build with AI</h1> -->

            <p class="event-desc" style="max-width: 800px; margin: 0 auto 30px; text-align:center;">
                Build with AI is a two-round hackathon where teams solve real-world problems by designing and
                building innovative AI-powered prototypes.
            </p>

            <!-- rest of your existing blocks (info grid, rounds, judging, rules, register button) -->

            <!-- Basic info like on Spectrum page -->
            <div class="event-info-grid">
                <div class="event-info-box">
                    <h3>Event Type</h3>
                    <p>Hackathon – AI-powered prototype building</p>
                </div>
                <div class="event-info-box">
                    <h3>Team Size</h3>
                    <p>2–4 members per team</p>
                </div>
                <div class="event-info-box">
                    <h3>Mode</h3>
                    <p>Offline, on campus</p>
                </div>
            </div>

            <!-- Rounds -->
            <div class="event-detail-block">
                <h2>Rounds &amp; Format</h2>

                <h3>Round 1 – Screening (MCQ Quiz)</h3>
                <ul>
                    <li>Objective MCQ quiz on basic AI, ML, programming and problem-solving.</li>
                    <li>Tests conceptual understanding rather than pure memorisation.</li>
                    <li>Top-scoring teams qualify for Round 2.</li>
                </ul>

                <h3>Round 2 – Prototype &amp; Pitch</h3>
                <ul>
                    <li>Qualified teams design and build an AI-based solution for a given problem statement.</li>
                    <li>Teams develop a working prototype / demo within the given time.</li>
                    <li>Short presentation / pitch to the judging panel explaining:
                        <ul>
                            <li>Problem definition and real-world impact</li>
                            <li>Data used and AI / ML techniques applied</li>
                            <li>Architecture, workflow and key features</li>
                            <li>Future scope and improvements</li>
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- Judging & rules -->
            <div class="event-detail-block">
                <h2>Judging Criteria</h2>
                <ul>
                    <li>Relevance of solution to the given problem statement</li>
                    <li>Innovation and creativity in applying AI</li>
                    <li>Technical soundness of the approach and implementation</li>
                    <li>Quality of prototype / demo</li>
                    <li>Clarity and effectiveness of presentation</li>
                    <li>Teamwork and overall impact</li>
                </ul>
            </div>

            <div class="event-detail-block">
                <h2>Rules &amp; Guidelines</h2>
                <ul>
                    <li>Teams must stick to the time limits announced for each round.</li>
                    <li>Use of AI tools, libraries and frameworks is allowed as per event instructions.</li>
                    <li>Plagiarism or copying other teams’ work will lead to disqualification.</li>
                    <li>The judges’ decision will be final and binding.</li>
                </ul>
            </div>

            <!-- Registration block like Spectrum’s “Register” section -->
            <div class="event-detail-block" style="text-align:center; margin-top:40px;">
                <h2>Register for Build with AI</h2>
                <p>
                    Form a team of 2–4 members and register to secure your slot in
                    AI Kshetra’s flagship AI hackathon.
                </p>
                <a href="register_build.php" class="btn btn-primary"
                   style="margin-top:20px; display:inline-block;">
                    Register Now
                </a>
            </div>
        </div>
    </section>
</main>




</body>
</html>
