<?php
// analytics.php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit;
}

include 'db.php';

// Define your events and their DB tables
$events = [
    'build' => [
        'name'  => 'Build with AI',
        'table' => 'registrations_build_with_ai'
    ],
    'codewarz' => [
        'name'  => 'CodeWarz',
        'table' => 'registrations_codewarz'
    ],
    'promptcraft' => [
        'name'  => 'PromptCraft',
        'table' => 'registrations_prompt_craft'
    ],
    'dreamframe' => [
        'name'  => 'DreamFrame',
        'table' => 'registrations_dream_frame'
    ],
];

// ---------- CSV EXPORT HANDLER (also protected by login above) ----------
if (isset($_GET['export'])) {
    $key = $_GET['export'];

    if (!isset($events[$key])) {
        http_response_code(404);
        echo "Unknown event.";
        exit;
    }

    $table = $events[$key]['table'];
    $filename = $key . "_registrations_" . date('Ymd_His') . ".csv";

    header('Content-Type: text/csv; charset=utf-8');
    header("Content-Disposition: attachment; filename=\"$filename\"");

    $output = fopen('php://output', 'w');

    $result = $conn->query("SELECT * FROM `$table`");

    if ($result && $result->num_rows > 0) {
        // Column headers
        $fields = $result->fetch_fields();
        $header = [];
        foreach ($fields as $field) {
            $header[] = $field->name;
        }
        fputcsv($output, $header);

        // Data rows
        $result->data_seek(0);
        while ($row = $result->fetch_assoc()) {
            // Decode HTML entities for CSV export
            $decodedRow = array_map(function($value) {
                return htmlspecialchars_decode((string)$value);
            }, $row);
            fputcsv($output, $decodedRow);
        }
    } else {
        fputcsv($output, ['No data available']);
    }

    fclose($output);
    exit;
}

// ---------- NORMAL PAGE RENDER ----------

// 1) Event-wise counts + data
$eventCounts = [];
$eventRows   = [];

foreach ($events as $key => $info) {
    $table = $info['table'];

    // Count
    $cntRes = $conn->query("SELECT COUNT(*) AS c FROM `$table`");
    $count = 0;
    if ($cntRes) {
        $row = $cntRes->fetch_assoc();
        $count = (int)$row['c'];
    }
    $eventCounts[$key] = $count;

    // Full data for table display
    $rows = [];
    $res = $conn->query("SELECT * FROM `$table`");
    if ($res && $res->num_rows > 0) {
        while ($r = $res->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    $eventRows[$key] = $rows;
}

// 2) College-wise & Branch-wise counts (combined from all events & all members)
$collegeCounts = [];
$branchCounts = [];

function addCount(&$arr, $val, $count = 1) {
    if (!$val) return;
    $val = htmlspecialchars_decode(trim($val));
    if ($val === '') return;
    if (!isset($arr[$val])) $arr[$val] = 0;
    $arr[$val] += $count;
}

// Build with AI (up to 4 members)
$res = $conn->query("SELECT member1_college, member1_branch, 
                            member2_college, member2_branch,
                            member3_college, member3_branch,
                            member4_college, member4_branch 
                     FROM registrations_build_with_ai");
if ($res) {
    while ($row = $res->fetch_assoc()) {
        addCount($collegeCounts, $row['member1_college']);
        addCount($branchCounts, $row['member1_branch']);
        
        addCount($collegeCounts, $row['member2_college']);
        addCount($branchCounts, $row['member2_branch']);
        
        addCount($collegeCounts, $row['member3_college']);
        addCount($branchCounts, $row['member3_branch']);
        
        addCount($collegeCounts, $row['member4_college']);
        addCount($branchCounts, $row['member4_branch']);
    }
}

// CodeWarz (up to 2 members)
$res = $conn->query("SELECT member1_college, member1_branch, 
                            member2_college, member2_branch 
                     FROM registrations_codewarz");
if ($res) {
    while ($row = $res->fetch_assoc()) {
        addCount($collegeCounts, $row['member1_college']);
        addCount($branchCounts, $row['member1_branch']);
        
        addCount($collegeCounts, $row['member2_college']);
        addCount($branchCounts, $row['member2_branch']);
    }
}

// PromptCraft (1 participant)
$res = $conn->query("SELECT participant_college, participant_branch 
                     FROM registrations_prompt_craft");
if ($res) {
    while ($row = $res->fetch_assoc()) {
        addCount($collegeCounts, $row['participant_college']);
        addCount($branchCounts, $row['participant_branch']);
    }
}

// DreamFrame (1 participant)
$res = $conn->query("SELECT participant_college, participant_branch 
                     FROM registrations_dream_frame");
if ($res) {
    while ($row = $res->fetch_assoc()) {
        addCount($collegeCounts, $row['participant_college']);
        addCount($branchCounts, $row['participant_branch']);
    }
}

// Sort by counts (descending)
arsort($collegeCounts);
arsort($branchCounts);

$conn->close();

// Prepare labels & counts for charts
$chartLabels = [];
$chartCounts = [];
foreach ($events as $key => $info) {
    $chartLabels[] = $info['name'];
    $chartCounts[] = $eventCounts[$key];
}

$collegeLabels = array_keys($collegeCounts);
$collegeValues = array_values($collegeCounts);

$branchLabels = array_keys($branchCounts);
$branchValues = array_values($branchCounts);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Analytics – AI Kshetra</title>

    <!-- Global styles -->
    <link rel="stylesheet" href="static/css/style.css">
    <!-- Analytics specific styles (your existing file) -->
    <link rel="stylesheet" href="static/css/analytics.css">

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* Simple admin header bar for analytics page */
        .analytics-admin-header {
            padding: 20px 0;
        }
        .analytics-admin-header-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .analytics-admin-header-inner h1 {
            font-family: var(--font-heading);
            font-size: 1.4rem;
        }
        .analytics-main {
            padding-bottom: 60px;
        }
        .college-table-wrapper {
            margin-top: 25px;
        }
        .college-table-wrapper table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }
        .college-table-wrapper th,
        .college-table-wrapper td {
            border: 1px solid rgba(255,255,255,0.1);
            padding: 8px 10px;
            text-align: left;
        }
        .college-table-wrapper th {
            background: rgba(255,255,255,0.03);
        }
    </style>
</head>
<body>

<!-- Simple admin header (NO radial menu here) -->
<header class="analytics-admin-header">
    <div class="analytics-admin-header-inner">
        <h1>Event Analytics – Admin View</h1>
        <div>
            <a href="admin_dashboard.php" class="btn btn-secondary" style="margin-right:10px;">
                ← Back to Dashboard
            </a>
            <a href="logout.php" class="btn btn-primary">
                Logout
            </a>
        </div>
    </div>
</header>

<main class="analytics-main">

    <!-- HERO / TITLE -->
    <section class="hero analytics-hero">
        <div class="container">
            <span class="hero-subtitle">Admin & Organiser View</span>
            <h1 class="hero-title">Event Analytics Dashboard</h1>
            <p class="hero-tagline">
                Monitor registrations, export data and analyse participation across all AI Kshetra events.
            </p>
        </div>
    </section>

    <section class="container analytics-container">

        <!-- QUICK SUMMARY CARDS -->
        <div class="analytics-summary-grid">
            <?php foreach ($events as $key => $info): ?>
                <div class="analytics-summary-card">
                    <h3><?php echo htmlspecialchars($info['name']); ?></h3>
                    <p class="summary-count"><?php echo $eventCounts[$key]; ?></p>
                    <p class="summary-label">Total Registrations</p>
                    <a href="#event-<?php echo $key; ?>" class="btn btn-secondary analytics-jump-btn">
                        View Details
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- CHARTS SECTION -->
        <div class="analytics-charts-block">
            <h2 class="section-title">Overview Analytics</h2>

            <div class="charts-grid">
                <div class="chart-card">
                    <h3>Registrations per Event (Bar)</h3>
                    <canvas id="eventBarChart"></canvas>
                </div>
                <div class="chart-card">
                    <h3>Registrations Share (Pie)</h3>
                    <canvas id="eventPieChart"></canvas>
                </div>
            </div>
        </div>

        <!-- COLLEGE-WISE SECTION -->
        <div class="analytics-charts-block">
            <h2 class="section-title">Registrations by College</h2>

            <div class="charts-grid">
                <div class="chart-card">
                    <h3>College-wise Registrations (Bar)</h3>
                    <canvas id="collegeBarChart"></canvas>
                </div>
            </div>

            <div class="college-table-wrapper">
                <h3 style="margin-bottom:10px;">College-wise Counts (Table)</h3>
                <table>
                    <thead>
                        <tr>
                            <th>College</th>
                            <th>No. of Participants</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($collegeCounts) === 0): ?>
                            <tr><td colspan="2">No registrations yet.</td></tr>
                        <?php else: ?>
                            <?php foreach ($collegeCounts as $college => $cnt): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($college); ?></td>
                                    <td><?php echo $cnt; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- BRANCH-WISE SECTION -->
        <div class="analytics-charts-block">
            <h2 class="section-title">Registrations by Branch</h2>

            <div class="charts-grid">
                <div class="chart-card">
                    <h3>Branch-wise Registrations (Bar)</h3>
                    <canvas id="branchBarChart"></canvas>
                </div>
            </div>

            <div class="college-table-wrapper">
                <h3 style="margin-bottom:10px;">Branch-wise Counts (Table)</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Branch</th>
                            <th>No. of Participants</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($branchCounts) === 0): ?>
                            <tr><td colspan="2">No registrations yet.</td></tr>
                        <?php else: ?>
                            <?php foreach ($branchCounts as $branch => $cnt): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($branch); ?></td>
                                    <td><?php echo $cnt; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- EVENT TABLES + CSV DOWNLOAD -->
        <?php foreach ($events as $key => $info): ?>
            <section id="event-<?php echo $key; ?>" class="event-section-block">
                <div class="event-section-header">
                    <h2><?php echo htmlspecialchars($info['name']); ?> – Registrations</h2>
                    <div>
                        <span class="event-count-pill">
                            Total: <?php echo $eventCounts[$key]; ?>
                        </span>
                        <a href="analytics.php?export=<?php echo $key; ?>" class="btn btn-primary csv-btn">
                            Download CSV
                        </a>
                    </div>
                </div>

                <?php if (empty($eventRows[$key])): ?>
                    <p class="event-note">No registrations yet for this event.</p>
                <?php else: ?>
                    <div class="table-wrapper">
                        <table class="event-table">
                            <thead>
                                <tr>
                                    <?php
                                    $firstRow = $eventRows[$key][0];
                                    foreach ($firstRow as $col => $val):
                                    ?>
                                        <th><?php echo htmlspecialchars($col); ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($eventRows[$key] as $row): ?>
                                    <tr>
                                        <?php foreach ($row as $val): ?>
                                            <td><?php echo htmlspecialchars(htmlspecialchars_decode((string)$val)); ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </section>
        <?php endforeach; ?>

    </section>
</main>

<!-- Pass chart data to JS -->
<script>
    const EVENT_LABELS   = <?php echo json_encode($chartLabels); ?>;
    const EVENT_COUNTS   = <?php echo json_encode($chartCounts); ?>;
    const COLLEGE_LABELS = <?php echo json_encode($collegeLabels); ?>;
    const COLLEGE_VALUES = <?php echo json_encode($collegeValues); ?>;

    function generateColors(n) {
        const colors = [];
        for (let i = 0; i < n; i++) {
            const hue = Math.floor((360 * i) / Math.max(n, 1));
            colors.push(`hsl(${hue}, 70%, 55%)`);
        }
        return colors;
    }

    // Event Bar Chart
    const ctxBar = document.getElementById('eventBarChart');
    if (ctxBar) {
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: EVENT_LABELS,
                datasets: [{
                    label: 'Registrations',
                    data: EVENT_COUNTS,
                    backgroundColor: generateColors(EVENT_LABELS.length)
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, ticks: { precision: 0 } }
                }
            }
        });
    }

    // Event Pie Chart
    const ctxPie = document.getElementById('eventPieChart');
    if (ctxPie) {
        new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: EVENT_LABELS,
                datasets: [{
                    data: EVENT_COUNTS,
                    backgroundColor: generateColors(EVENT_LABELS.length)
                }]
            },
            options: {
                responsive: true
            }
        });
    }

    // College Bar Chart (horizontal)
    const ctxCollege = document.getElementById('collegeBarChart');
    if (ctxCollege && COLLEGE_LABELS.length > 0) {
        new Chart(ctxCollege, {
            type: 'bar',
            data: {
                labels: COLLEGE_LABELS,
                datasets: [{
                    label: 'Participants',
                    data: COLLEGE_VALUES,
                    backgroundColor: generateColors(COLLEGE_LABELS.length)
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                plugins: { legend: { display: false } },
                scales: {
                    x: { beginAtZero: true, ticks: { precision: 0 } }
                }
            }
        });
    }

    // Branch Bar Chart (horizontal)
    const BRANCH_LABELS = <?php echo json_encode($branchLabels); ?>;
    const BRANCH_VALUES = <?php echo json_encode($branchValues); ?>;
    
    const ctxBranch = document.getElementById('branchBarChart');
    if (ctxBranch && BRANCH_LABELS.length > 0) {
        new Chart(ctxBranch, {
            type: 'bar',
            data: {
                labels: BRANCH_LABELS,
                datasets: [{
                    label: 'Participants',
                    data: BRANCH_VALUES,
                    backgroundColor: generateColors(BRANCH_LABELS.length)
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                plugins: { legend: { display: false } },
                scales: {
                    x: { beginAtZero: true, ticks: { precision: 0 } }
                }
            }
        });
    }
</script>

</body>
</html>
