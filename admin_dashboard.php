<?php
session_start();

// Optional: session timeout (30 mins)
$timeout = 1800; // seconds
if (isset($_SESSION['LAST_ACTIVE']) && (time() - $_SESSION['LAST_ACTIVE']) > $timeout) {
    session_unset();
    session_destroy();
    header("Location: admin_login.php?timeout=1");
    exit;
}
$_SESSION['LAST_ACTIVE'] = time();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit;
}

include 'db.php';

// ---------- 1. Event-wise registration counts ----------
$buildCount = 0;
$codeCount = 0;
$promptCount = 0;
$dreamCount = 0;

// Build with AI
$res = $conn->query("SELECT COUNT(*) AS c FROM registrations_build_with_ai");
if ($res && $row = $res->fetch_assoc()) $buildCount = (int)$row['c'];

// CodeWarz
$res = $conn->query("SELECT COUNT(*) AS c FROM registrations_codewarz");
if ($res && $row = $res->fetch_assoc()) $codeCount = (int)$row['c'];

// PromptCraft
$res = $conn->query("SELECT COUNT(*) AS c FROM registrations_prompt_craft");
if ($res && $row = $res->fetch_assoc()) $promptCount = (int)$row['c'];

// DreamFrame
$res = $conn->query("SELECT COUNT(*) AS c FROM registrations_dream_frame");
if ($res && $row = $res->fetch_assoc()) $dreamCount = (int)$row['c'];

$eventLabels = ['Build with AI', 'CodeWarz', 'PromptCraft', 'DreamFrame'];
$eventCounts = [$buildCount, $codeCount, $promptCount, $dreamCount];

// ---------- 2. College-wise counts (from all events) ----------
$collegeCounts = [];

function addCollegeCount(&$arr, $college, $count = 1) {
    if (!$college) return;
    $college = trim($college);
    if ($college === '') return;
    if (!isset($arr[$college])) $arr[$college] = 0;
    $arr[$college] += $count;
}

// Build with AI – member1_college
$res = $conn->query("SELECT member1_college AS college, COUNT(*) AS c 
                     FROM registrations_build_with_ai 
                     GROUP BY member1_college");
if ($res) {
    while ($row = $res->fetch_assoc()) {
        addCollegeCount($collegeCounts, $row['college'], (int)$row['c']);
    }
}

// CodeWarz – member1_college
$res = $conn->query("SELECT member1_college AS college, COUNT(*) AS c 
                     FROM registrations_codewarz 
                     GROUP BY member1_college");
if ($res) {
    while ($row = $res->fetch_assoc()) {
        addCollegeCount($collegeCounts, $row['college'], (int)$row['c']);
    }
}

// PromptCraft – participant_college
$res = $conn->query("SELECT participant_college AS college, COUNT(*) AS c 
                     FROM registrations_prompt_craft 
                     GROUP BY participant_college");
if ($res) {
    while ($row = $res->fetch_assoc()) {
        addCollegeCount($collegeCounts, $row['college'], (int)$row['c']);
    }
}

// DreamFrame – participant_college
$res = $conn->query("SELECT participant_college AS college, COUNT(*) AS c 
                     FROM registrations_dream_frame 
                     GROUP BY participant_college");
if ($res) {
    while ($row = $res->fetch_assoc()) {
        addCollegeCount($collegeCounts, $row['college'], (int)$row['c']);
    }
}

// Sort colleges by total registrations
arsort($collegeCounts);

$collegeLabels = array_keys($collegeCounts);
$collegeValues = array_values($collegeCounts);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard – AI Kshetra</title>
    <link rel="stylesheet" href="static/css/style.css">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            padding: 40px 0;
        }
        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px 40px;
        }
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .admin-header h1 {
            font-family: var(--font-heading);
            font-size: 2rem;
        }
        .logout-link {
            color: var(--accent-secondary);
            text-decoration: none;
            font-size: 0.9rem;
        }
        .cards-row {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(220px,1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        .stat-card {
            background: var(--card-bg);
            border-radius: 10px;
            border: 1px solid var(--card-border);
            padding: 20px;
        }
        .stat-card h3 {
            font-family: var(--font-heading);
            margin-bottom: 8px;
            font-size: 1rem;
        }
        .stat-card .big-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--accent-secondary);
        }
        .chart-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(320px,1fr));
            gap: 30px;
            margin-bottom: 40px;
        }
        .chart-box {
            background: var(--card-bg);
            border-radius: 12px;
            border: 1px solid var(--card-border);
            padding: 20px;
        }
        .chart-box h2 {
            font-family: var(--font-heading);
            font-size: 1.1rem;
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 0.9rem;
        }
        th, td {
            border: 1px solid rgba(255,255,255,0.1);
            padding: 8px 10px;
            text-align: left;
        }
        th {
            background: rgba(255,255,255,0.03);
        }
    </style>
</head>
<body>

<div class="admin-container">
    <div class="admin-header">
        <h1>Admin &amp; Organiser Panel</h1>
        <a href="logout.php" class="logout-link">Logout</a>
    </div>

    <!-- Summary cards -->
    <div class="cards-row">
        <div class="stat-card">
            <h3>Total Build with AI Teams</h3>
            <div class="big-number"><?= $buildCount ?></div>
        </div>
        <div class="stat-card">
            <h3>Total CodeWarz Registrations</h3>
            <div class="big-number"><?= $codeCount ?></div>
        </div>
        <div class="stat-card">
            <h3>Total PromptCraft Participants</h3>
            <div class="big-number"><?= $promptCount ?></div>
        </div>
        <div class="stat-card">
            <h3>Total DreamFrame Participants</h3>
            <div class="big-number"><?= $dreamCount ?></div>
        </div>
    </div>

    <!-- Charts -->
    <div class="chart-grid">
        <div class="chart-box">
            <h2>Registrations per Event (Bar)</h2>
            <canvas id="eventBarChart"></canvas>
        </div>
        <div class="chart-box">
            <h2>Registrations Share (Pie)</h2>
            <canvas id="eventPieChart"></canvas>
        </div>
    </div>

    <!-- Link to full analytics -->
    <div style="text-align:center; margin-top:40px;">
        <a href="analytics.php" class="btn btn-primary"
           style="display:inline-block; padding:12px 30px;">
            View Full Analytics
        </a>
    </div>

    <!-- College wise -->
    <div class="chart-box" style="margin-top:40px;">
        <h2>Registrations by College (Bar)</h2>
        <canvas id="collegeBarChart"></canvas>

        <h3 style="margin-top:20px;">College-wise Counts (Table)</h3>
        <table>
            <thead>
                <tr>
                    <th>College</th>
                    <th>No. of Registrations (Teams / Participants)</th>
                </tr>
            </thead>
            <tbody>
            <?php if (count($collegeCounts) === 0): ?>
                <tr><td colspan="2">No registrations yet.</td></tr>
            <?php else: ?>
                <?php foreach ($collegeCounts as $college => $cnt): ?>
                    <tr>
                        <td><?= htmlspecialchars($college) ?></td>
                        <td><?= $cnt ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
// === Data from PHP ===
const eventLabels = <?= json_encode($eventLabels) ?>;
const eventCounts = <?= json_encode($eventCounts) ?>;

const collegeLabels = <?= json_encode($collegeLabels) ?>;
const collegeValues = <?= json_encode($collegeValues) ?>;

// Helper: generate colors
function generateColors(n) {
    const colors = [];
    for (let i = 0; i < n; i++) {
        const hue = Math.floor(360 * i / Math.max(n,1));
        colors.push(`hsl(${hue}, 70%, 55%)`);
    }
    return colors;
}

// Event Bar
const ctxBar = document.getElementById('eventBarChart');
if (ctxBar) {
    new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: eventLabels,
            datasets: [{
                label: 'Registrations',
                data: eventCounts,
                backgroundColor: generateColors(eventLabels.length),
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true, ticks: { precision: 0 } }
            }
        }
    });
}

// Event Pie
const ctxPie = document.getElementById('eventPieChart');
if (ctxPie) {
    new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: eventLabels,
            datasets: [{
                data: eventCounts,
                backgroundColor: generateColors(eventLabels.length),
            }]
        },
        options: {
            responsive: true,
        }
    });
}

// College Bar
const ctxCollege = document.getElementById('collegeBarChart');
if (ctxCollege && collegeLabels.length > 0) {
    new Chart(ctxCollege, {
        type: 'bar',
        data: {
            labels: collegeLabels,
            datasets: [{
                label: 'Registrations',
                data: collegeValues,
                backgroundColor: generateColors(collegeLabels.length),
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: { beginAtZero: true, ticks: { precision: 0 } }
            }
        }
    });
}
</script>

</body>
</html>
