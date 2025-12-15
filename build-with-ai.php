<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Build with AI - Prototype Hackathon | AI Kshetra 2025</title>
    <meta name="description" content="Participate in Build with AI, a 2-day Hackathon at AI Kshetra 2025. Build real-world AI prototypes and pitch your ideas.">
    <meta name="keywords" content="Build with AI, Hackathon, AI Prototype, RVRJC, AI Kshetra, Project Expo">

    <!-- Open Graph -->
    <meta property="og:title" content="Build with AI - Prototype Hackathon">
    <meta property="og:description" content="Build real-world AI prototypes and pitch your ideas. Join the hackathon at AI Kshetra 2025.">
    <meta property="og:image" content="https://rvrjcce.ac.in/xcsm/aikshetra2K25/static/css/main.jpg">
    <meta property="og:url" content="https://rvrjcce.ac.in/xcsm/aikshetra2K25/build-with-ai.php">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Event",
      "name": "Build with AI - AI Kshetra 2025",
      "startDate": "2025-12-26T13:30",
      "endDate": "2025-12-27T15:00",
      "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
      "eventStatus": "https://schema.org/EventScheduled",
      "location": {
        "@type": "Place",
        "name": "HT-1, HT-2 Labs, RVR & JC College of Engineering",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "Chandramoulipuram, Chowdavaram",
          "addressLocality": "Guntur",
          "postalCode": "522019",
          "addressRegion": "Andhra Pradesh",
          "addressCountry": "IN"
        }
      },
      "image": [
        "https://rvrjcce.ac.in/xcsm/aikshetra2K25/static/css/main.jpg"
      ],
      "description": "Build with AI is a two-round hackathon where teams identify a real-world problem, design an AI-based solution, and demonstrate a working prototype.",
      "offers": {
        "@type": "Offer",
        "url": "https://rvrjcce.ac.in/xcsm/aikshetra2K25/register_build.php",
        "price": "0",
        "priceCurrency": "INR",
        "availability": "https://schema.org/InStock",
        "validFrom": "2024-12-12T00:00"
      },
      "organizer": {
        "@type": "Organization",
        "name": "NEXAA - AI Kshetra",
        "url": "https://rvrjcce.ac.in/xcsm/aikshetra2K25"
      }
    }
    </script>

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
        <h1 class="hero-title">Build with AI</h1>
        <p class="hero-tagline">AI-powered Prototype Hackathon</p>

        <a href="register_build.php" class="btn btn-primary hero-cta-top">
            Register Now
        </a>
    </div>
</section>

<section class="events">
    <div class="container event-details-page">

        <p class="event-desc" style="max-width: 800px; margin: 0 auto 30px; text-align:center;">
            <strong>Build with AI</strong> is a two-round hackathon where teams identify a real-world problem,
            design an AI-based solution, and demonstrate a working prototype along with a structured pitch.
        </p>

        <!-- Quick Info -->
        <div class="event-info-grid">
            <div class="event-info-box">
                <h3>Event Type</h3>
                <p>AI Prototype Hackathon</p>
            </div>
            <div class="event-info-box">
                <h3>Team Size</h3>
                <p>2–4 Members (Team)</p>
            </div>
            <div class="event-info-box">
                <h3>Mode</h3>
                <p>Offline, On Campus</p>
            </div>
        </div>

        <!-- NEW: Event Schedule -->
        <div class="event-detail-block" style="border-left: 4px solid var(--accent-secondary); background: rgba(0, 245, 212, 0.05);">
            <h2 style="color: var(--accent-secondary);">📅 Event Schedule & Venue</h2>
            <div class="schedule-grid" style="display: grid; gap: 20px;">
                <div class="schedule-item">
                    <h3 style="margin-bottom: 5px; color: #fff;">Preliminary Round (MCQ)</h3>
                    <p style="font-size: 1.1rem; color: var(--text-primary);">
                        <strong>Date:</strong> December 26th<br>
                        <strong>Time:</strong> 1:30 PM - 5:00 PM<br>
                        <strong>Duration:</strong> 15 mins<br>
                        <strong>Venue:</strong> HT-1, HT-2 Labs (Hi-Tech Block)<br>
                        <strong style="color: var(--accent-secondary);">🏆 Top 15 Teams Shortlisted</strong>
                    </p>
                </div>
                <div class="schedule-item">
                    <h3 style="margin-bottom: 5px; color: #fff;">Main Round (Prototype)</h3>
                    <p style="font-size: 1.1rem; color: var(--text-primary);">
                        <strong>Date:</strong> December 27th<br>
                        <strong>Time:</strong> 10:00 AM - 3:00 PM<br>
                        <strong>Venue:</strong> HT-1, HT-2 Labs (Hi-Tech Block)
                    </p>
                </div>
            </div>
        </div>

        <!-- About -->
        <div class="event-detail-block">
            <h2>About the Event</h2>
            <p>
                The main objective of <strong>Build with AI</strong> is to encourage students to convert their ideas
                into practical AI solutions. Teams can work on domains like healthcare, education, agriculture,
                smart campus, automation, environment, and more.
            </p>
            <p>
                Participants are expected to think end-to-end: from clearly defining the problem and choosing data,
                to model design, implementation, evaluation and a realistic demonstration of impact.
            </p>
        </div>

        <!-- Rounds -->
        <div class="event-detail-block">
            <h2>Rounds &amp; Format</h2>

            <h3>Round 1 – Screening (MCQ Quiz)</h3>
            <ul>
                <li>Objective quiz on AI/ML basics, Python, data handling and logical reasoning.</li>
                <li>20 questions, time-bound.</li>
                <li>Top 15 teams qualify for the prototype round.</li>
            </ul>

            <h3>Round 2 – Prototype &amp; Pitch</h3>
            <p><strong>Note:</strong> Problem statements for Round 2 will be given at the event time only.</p>
            <ul>
                <li>Teams build a functional prototype / demo for their chosen problem within the time limit.</li>
                <li>They present:
                    <ul>
                        <li>Problem statement and motivation</li>
                        <li>Application architecture and workflow</li>
                        <li>Demo of the working solution</li>
                        <li>Impact, limitations, and future scope</li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- Judging -->
        <div class="event-detail-block">
            <h2>Judging Criteria</h2>
            <ul>
                <li>Relevance and clarity of the problem statement</li>
                <li>Innovation and creativity in applying AI</li>
                <li>Technical correctness and feasibility of the solution</li>
                <li>Quality and completeness of the prototype / demo</li>
                <li>Clarity of presentation and ability to answer questions</li>
                <li>Scalability, impact and future potential</li>
            </ul>
        </div>

        <!-- Rules -->
        <div class="event-detail-block">
            <h2>Rules &amp; Guidelines</h2>
            <ul>
                <li>Each team must have 2–4 members; one member should be the designated team leader.</li>
                <li>All members must be registered students of a recognised institution.</li>
                <li>Use of AI tools, open-source libraries and frameworks is allowed, with proper acknowledgement.</li>
                <li>Any form of plagiarism or copying another team’s work will lead to disqualification.</li>
                <li>Participants must adhere to the time limits and instructions given by organisers.</li>
                <li>The decision of judges and organisers will be final and binding.</li>
            </ul>
        </div>

        <!-- Prizes -->
        <div class="event-detail-block">
            <h2>Prizes</h2>
            <ul>
                <li><strong>1st Prize:</strong> ₹3000</li>
                <li><strong>2nd Prize:</strong> ₹2000</li>
                <li><strong>3rd Prize:</strong> ₹1000</li>
            </ul>
        </div>

        <!-- Event Coordinators -->
        <div class="event-detail-block">
            <h2>Event Coordinators</h2>
            <p>For any queries regarding this event, please contact:</p>
            
            <div class="coordinator-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-top: 20px;">
                <!-- Student Coordinators -->
                <div>
                    <h3 style="font-size: 1.2rem; margin-bottom: 15px; color: var(--accent-primary); border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 5px;">Student Coordinators</h3>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 15px;">
                            <strong style="font-size: 1.1em;">G.N.V Nihar</strong><br>
                            <a href="tel:+917093725382" style="color: var(--accent-secondary); text-decoration: none;">+91 70937 25382</a>
                        </li>
                        <li style="margin-bottom: 15px;">
                            <strong style="font-size: 1.1em;">K. Joseph Prem Kumar</strong><br>
                            <a href="tel:+919392122287" style="color: var(--accent-secondary); text-decoration: none;">+91 93921 22287</a>
                        </li>
                    </ul>
                </div>

                <!-- Faculty Coordinators -->
                <div>
                    <h3 style="font-size: 1.2rem; margin-bottom: 15px; color: var(--accent-primary); border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 5px;">Faculty Coordinators</h3>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 10px;">
                            <strong>Mr. Muvva Praveen Kumar</strong><br>
                            <span style="font-size: 0.9em; color: var(--text-secondary);">Coordinator for Build with AI</span>
                        </li>
                        <li style="margin-bottom: 10px;">
                            <strong>Mrs. Vasanthi Yarra</strong><br>
                            <span style="font-size: 0.9em; color: var(--text-secondary);">Faculty Member</span>
                        </li>
                        <li style="margin-bottom: 10px;">
                            <strong>Mrs. Koppolu Sireesha</strong><br>
                            <span style="font-size: 0.9em; color: var(--text-secondary);">Faculty Member</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Shortlisted Teams -->
        <section class="event-detail-block" id="round2">
            <div class="event-section-header">
                <h2>Round 2 – Shortlisted Teams</h2>
                <span class="badge upcoming">Will be updated after Round 1</span>
            </div>

            <div class="table-wrapper">
                <table class="event-table">
                    <thead>
                        <tr>
                            <th>S. No.</th>
                            <th>Member 1 Name</th>
                            <th>Member 2 Name</th>
                            <th>Member 3 Name</th>
                            <th>Member 4 Name</th>
                            <th>Leader Phone</th>
                            <th>College</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Later: fill from database. Empty cells are okay if team has 2 or 3 members. -->
                        <tr>
                            <td colspan="7" style="text-align:center; opacity:0.7;">
                                Round-2 shortlist not published yet.
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
                            <th>Member 1 Name</th>
                            <th>Member 2 Name</th>
                            <th>Member 3 Name</th>
                            <th>Member 4 Name</th>
                            <th>College</th>
                            <th>Prize</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Later: fill from database. Each row = one team. -->
                        <tr>
                            <td colspan="7" style="text-align:center; opacity:0.7;">
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
                Every registered team member who attends <strong>Build with AI</strong> will receive an
                <strong>e-certificate of participation</strong> after the event.
                Teams that qualify for Round 2 and the winning teams will additionally receive
                <strong>printed hardcopy certificates</strong> at the venue.
            </p>
            <p>
                E-certificate download links will be updated here once they are generated and uploaded.
            </p>
        </section>

        <!-- Gallery -->
        <section class="event-detail-block" id="gallery">
            <div class="event-section-header">
                <h2>Event Gallery</h2>
                <span class="badge info">Photos</span>
            </div>

            <p>
                Photo highlights from <strong>Build with AI</strong> – including team discussions, prototype demos,
                jury interactions and prize distribution – will be showcased here after the event.
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
