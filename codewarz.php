<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CodeWarz - Competitive Coding Event | AI Kshetra 2025</title>
    <meta name="description" content="Register for CodeWarz at AI Kshetra 2025. A competitive coding challenge testing algorithms, logic, and speed. Win prizes worth ₹6000!">
    <meta name="keywords" content="CodeWarz, Competitive Coding, Algorithm, Hackathon, RVRJC, AI Kshetra">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Open Graph -->
    <meta property="og:title" content="CodeWarz - Competitive Coding Challenge">
    <meta property="og:description" content="Join CodeWarz, the ultimate coding battle at AI Kshetra 2025. Test your algorithmic skills!">
    <meta property="og:image" content="https://rvrjcce.ac.in/xcsm/aikshetra2K25/static/css/main.jpg">
    <meta property="og:url" content="https://rvrjcce.ac.in/xcsm/aikshetra2K25/codewarz.php">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Event",
      "name": "CodeWarz - AI Kshetra 2025",
      "startDate": "2025-12-26T13:30",
      "endDate": "2025-12-27T16:00",
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
      "description": "CodeWarz is a structured competitive programming event designed to evaluate participants' proficiency in coding, algorithms, and problem-solving.",
      "offers": {
        "@type": "Offer",
        "url": "https://rvrjcce.ac.in/xcsm/aikshetra2K25/register_code.php",
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
            <strong>CodeWarz</strong> is a structured competitive programming event designed to evaluate participants' proficiency in coding, algorithms, and problem-solving. The competition features multiple rounds that test theoretical knowledge, analytical capability, coding accuracy, and response speed.
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
                <h3>Platform</h3>
                <p>HackerRank</p>
            </div>
        </div>

        <!-- NEW: Event Schedule -->
        <div class="event-detail-block" style="border-left: 4px solid var(--accent-secondary); background: rgba(0, 245, 212, 0.05);">
            <h2 style="color: var(--accent-secondary);">📅 Event Schedule & Venue</h2>
            <div class="schedule-grid" style="display: grid; gap: 20px;">
                <div class="schedule-item">
                    <h3 style="margin-bottom: 5px; color: #fff;">Preliminary Round</h3>
                    <p style="font-size: 1.1rem; color: var(--text-primary);">
                        <strong>Date:</strong> December 26th<br>
                        <strong>Time:</strong> 1:30 PM - 5:00 PM<br>
                        <strong>Duration:</strong> 15 mins (MCQ)<br>
                        <strong>Venue:</strong> HT-1, HT-2 Labs (Hi-Tech Block)<br>
                        <strong style="color: var(--accent-secondary);">🏆 Top 20 Teams Shortlisted</strong>
                    </p>
                </div>
                <div class="schedule-item">
                    <h3 style="margin-bottom: 5px; color: #fff;">Main Round</h3>
                    <p style="font-size: 1.1rem; color: var(--text-primary);">
                        <strong>Date:</strong> December 27th<br>
                        <strong>Time:</strong> 1:00 PM - 4:00 PM<br>
                        <strong>Venue:</strong> HT-1, HT-2 Labs (Hi-Tech Block)
                    </p>
                </div>
            </div>
        </div>

        <div class="event-detail-block">
            <h2>Event Overview</h2>
            <p>
                Participants compete in teams of two and progress through a preliminary screening followed by an intensive multi-round main event. Each stage is designed to assess different dimensions of technical competence.
            </p>
        </div>

        <div class="event-detail-block">
            <h2>Round Structure</h2>

            <h3>Preliminary Round</h3>
            <p>An MCQ-based assessment covering <strong>Programming Fundamentals</strong> and <strong>Data Structures & Algorithms (DSA)</strong>.</p>
            <ul>
                <li>Top 20 scoring teams will qualify for the Main Rounds.</li>
            </ul>

            <h3>Main Rounds</h3>
            <p>The main event consists of four sub-rounds:</p>

            <h4>1) Coding Round</h4>
            <ul>
                <li>Five programming problems of varying difficulty levels (Easy, Medium, Hard).</li>
                <li>Evaluation focuses on logic, efficiency, and correctness.</li>
            </ul>

            <h4>2) Fill the Algorithm</h4>
            <ul>
                <li>Teams analyze and correct incomplete algorithms.</li>
                <li>Tests understanding of algorithmic flow and optimization.</li>
            </ul>

            <h4>3) Rapid Fire</h4>
            <ul>
                <li>A quick-response technical round aimed at testing fundamental knowledge and presence of mind.</li>
            </ul>

            <h4>4) ReelsRiddle</h4>
            <ul>
                <li>A visual interpretation round where participants identify programming concepts based on short video clips.</li>
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
                            <strong style="font-size: 1.1em;">A. Nagalakshmi</strong><br>
                            <a href="tel:+917842441985" style="color: var(--accent-secondary); text-decoration: none;">+91 7842441985</a>
                        </li>
                        <li style="margin-bottom: 15px;">
                            <strong style="font-size: 1.1em;">A. Amulya</strong><br>
                            <a href="tel:+919391339152" style="color: var(--accent-secondary); text-decoration: none;">+91 9391339152</a>
                        </li>
                    </ul>
                </div>

                <!-- Faculty Coordinators -->
                <div>
                    <h3 style="font-size: 1.2rem; margin-bottom: 15px; color: var(--accent-primary); border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 5px;">Faculty Coordinators</h3>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 10px;">
                            <strong>Dr. Seli Mohapatra</strong><br>
                            <span style="font-size: 0.9em; color: var(--text-secondary);">Coordinator for CodeWarz</span>
                        </li>
                        <li style="margin-bottom: 10px;">
                            <strong>Sri Kommineni Venkata Ranga Rao</strong><br>
                            <span style="font-size: 0.9em; color: var(--text-secondary);">Faculty Member</span>
                        </li>
                        <li style="margin-bottom: 10px;">
                            <strong>Mrs. Vinnakota Naga Venkata Swathi</strong><br>
                            <span style="font-size: 0.9em; color: var(--text-secondary);">Faculty Member</span>
                        </li>
                    </ul>
                </div>
            </div>
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
