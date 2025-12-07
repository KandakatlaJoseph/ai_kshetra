<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DreamFrame – AI Kshetra</title>
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
        <h1 class="hero-title">DreamFrame</h1>
        <p class="hero-tagline">Creative Poster Design Challenge</p>

        <a href="register_dream.php" class="btn btn-primary hero-cta-top">
            Register Now
        </a>
    </div>
</section>

<section class="events">
    <div class="container event-details-page">

        <!-- Short intro -->
        <p class="event-desc" style="max-width: 800px; margin: 0 auto 30px; text-align:center;">
            <strong>DreamFrame</strong> is a creative poster design competition where participants use Canva to produce visually compelling posters based on a theme revealed at the start of the event. The challenge highlights creativity, message clarity, effective layout, and visual communication skills.
        </p>

        <!-- Quick info -->
        <div class="event-info-grid">
            <div class="event-info-box">
                <h3>Event Type</h3>
                <p>Poster Design Challenge</p>
            </div>
            <div class="event-info-box">
                <h3>Participation</h3>
                <p>Solo Only</p>
            </div>
            <div class="event-info-box">
                <h3>Tool</h3>
                <p>Canva</p>
            </div>
        </div>

        <!-- About the Event -->
        <div class="event-detail-block">
            <h2>About the Event</h2>
            <p>
                <strong>DreamFrame</strong> is for students who enjoy design, visual storytelling, and communication. Participants receive a theme or problem statement at the beginning and must convert it into a powerful poster conveying the message instantly.
            </p>
            <p>
                The focus goes beyond aesthetics, emphasizing clarity, layout balance, and strong idea representation.
            </p>
        </div>

        <!-- Event Format -->
        <div class="event-detail-block">
            <h2>Event Format</h2>
            <ul>
                <li><strong>Theme Reveal:</strong> A theme or storyline is announced at the start (e.g., awareness, innovation, social cause, fest branding).</li>
                <li><strong>Design Duration:</strong> Participants get <strong>60 minutes</strong> to create their poster in Canva.</li>
                <li><strong>Resources:</strong> Allowed elements include shapes, icons, illustrations, typography, and Canva's built-in tools.</li>
                <li><strong>Submission:</strong> The final poster must be exported (PNG/JPEG) and submitted before the deadline.</li>
                <li><strong>Short Presentation:</strong> Each participant delivers a <strong>1–2 minute</strong> explanation of their concept and design choices.</li>
            </ul>
        </div>

        <!-- Judging Criteria -->
        <div class="event-detail-block">
            <h2>Judging Criteria</h2>
            <ul>
                <li><strong>Creativity &amp; Originality:</strong> How unique and imaginative is the concept?</li>
                <li><strong>Visual Appeal:</strong> Overall look and feel, use of colors, fonts, spacing and layout.</li>
                <li><strong>Message Clarity:</strong> Is the main idea/theme immediately understandable?</li>
                <li><strong>Relevance to Theme:</strong> How well does the poster align with the given topic or brief?</li>
                <li><strong>Composition &amp; Balance:</strong> Proper alignment, hierarchy of text, and focus points.</li>
                <li><strong>Presentation &amp; Explanation:</strong> How confidently and clearly the participant
                    describes their design choices and story behind the poster.</li>
            </ul>
        </div>

        <!-- Rules & Guidelines -->
        <div class="event-detail-block">
            <h2>Rules &amp; Guidelines</h2>
            <ul>
                <li>Participation is strictly <strong>individual</strong> (solo); no team entries are allowed.</li>
                <li>All designs must be created using <strong>Canva</strong> during the event duration.</li>
                <li>Pre-made templates may be used as a base, but the final design must show clear
                    <strong>customisation and originality</strong>.</li>
                <li>Participants should not use any copyrighted images/logos without permission,
                    except those available inside Canva’s free resources.</li>
                <li>Obscene, offensive, or inappropriate content is strictly prohibited and will lead to disqualification.</li>
                <li>Late submissions beyond the allotted time may receive penalties or be rejected.</li>
                <li>The organisers and judges reserve the right to modify rules and their decision will be final.</li>
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
            <ul>
                <li>
                    <strong>V. Siri Chandana</strong><br>
                    CoOrdinator, DreamFrame<br>
                    <a href="tel:+917075032603" style="color: var(--accent-secondary);">+91 7075032603</a>
                </li>
                <li>
                    <strong>P. Simhadri</strong><br>
                    CoOrdinator, DreamFrame<br>
                    <a href="tel:+916301676383" style="color: var(--accent-secondary);">+91 6301676383</a>
                </li>
            </ul>
        </div>

        <!-- Shortlisted Participants -->
        <section class="event-detail-block" id="round2">
            <div class="event-section-header">
                <h2>Shortlisted Participants</h2>
                <span class="badge upcoming">Will be updated after Evaluation</span>
            </div>

            <div class="table-wrapper">
                <table class="event-table">
                    <thead>
                        <tr>
                            <th>S. No.</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>College</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Later: fill from registrations_dream_frame -->
                        <tr>
                            <td colspan="4" style="text-align:center; opacity:0.7;">
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
                            <th>Name</th>
                            <th>College</th>
                            <th>Prize</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Later: fill from results -->
                        <tr>
                            <td colspan="4" style="text-align:center; opacity:0.7;">
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
                Every registered participant of <strong>DreamFrame</strong> who attends the event will receive an
                <strong>e-certificate of participation</strong>.
            </p>
            <p>
                The winners (1st, 2nd and 3rd prize) will additionally receive
                <strong>printed hardcopy certificates</strong> during the award ceremony.
            </p>
            <p>
                E-certificate download instructions and links will be updated here after the event.
            </p>
        </section>

        <!-- Event Gallery -->
        <section class="event-detail-block" id="gallery">
            <div class="event-section-header">
                <h2>Event Gallery</h2>
                <span class="badge info">Photos</span>
            </div>

            <p>
                Selected posters, behind-the-scenes moments and award photos from
                <strong>DreamFrame</strong> will be showcased here once the event concludes.
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
