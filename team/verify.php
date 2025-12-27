<?php
$jsonFile = __DIR__ . '/team.json';

$teamData = json_decode(file_get_contents($jsonFile), true);

$id = $_GET['id'] ?? '';
$id = trim($id);

$isValid = isset($teamData[$id]);
$member = $isValid ? $teamData[$id] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Team ID Verification – AI Kshetra</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
    margin: 0;
    font-family: system-ui, sans-serif;
    background: #020617;
    color: #e5e7eb;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
}
.card {
    background: #0f172a;
    padding: 28px;
    border-radius: 16px;
    max-width: 420px;
    width: 92%;
    text-align: center;
    box-shadow: 0 20px 50px rgba(0,0,0,0.5);
}
.success { color: #22c55e; }
.error { color: #ef4444; }
.label {
    font-size: 13px;
    opacity: 0.7;
}
.value {
    font-size: 16px;
    margin-bottom: 12px;
}
.badge {
    display: inline-block;
    padding: 6px 14px;
    background: #1e293b;
    border-radius: 999px;
    margin-bottom: 16px;
}
</style>
</head>
<body>

<div class="card">
    <h2>AI Kshetra – Team ID Verification</h2>

    <?php if ($isValid): ?>
        <h3 class="success">✅ Valid Team Member</h3>

        <div class="badge"><?= htmlspecialchars($id) ?></div>

        <div class="label">Name</div>
        <div class="value"><?= htmlspecialchars($member['name']) ?></div>

        <div class="label">Role</div>
        <div class="value"><?= htmlspecialchars($member['role']) ?></div>

        <div class="label">Team</div>
        <div class="value"><?= htmlspecialchars($member['team']) ?></div>

        <div class="label">Department</div>
        <div class="value"><?= htmlspecialchars($member['department']) ?></div>

        <div class="label">College</div>
        <div class="value"><?= htmlspecialchars($member['college']) ?></div>

        <div class="label">Valid Till</div>
        <div class="value"><?= htmlspecialchars($member['valid_till']) ?></div>

    <?php else: ?>
        <h3 class="error">❌ Invalid / Expired ID</h3>
        <p>This QR code does not belong to an authorized AI Kshetra team member.</p>
    <?php endif; ?>
</div>

</body>
</html>
