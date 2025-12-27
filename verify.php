<?php
require_once 'certificates.php';

$certificateId = $_GET['id'] ?? '';
$certificateId = trim($certificateId);

$isValid = false;
$data = null;

if ($certificateId && isset($certificates[$certificateId])) {
    $isValid = true;
    $data = $certificates[$certificateId];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certificate Verification – AI Kshetra</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: system-ui, sans-serif;
            background: #0f172a;
            color: #e5e7eb;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .card {
            background: #020617;
            border-radius: 14px;
            padding: 28px;
            max-width: 420px;
            width: 90%;
            box-shadow: 0 10px 40px rgba(0,0,0,0.4);
            text-align: center;
        }
        .success { color: #22c55e; }
        .error { color: #ef4444; }
        .label {
            opacity: 0.7;
            font-size: 14px;
        }
        .value {
            font-size: 16px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>AI Kshetra Certificate Verification</h2>

    <?php if ($isValid): ?>
        <h3 class="success">✅ Certificate Verified</h3>

        <div class="label">Certificate ID</div>
        <div class="value"><?= htmlspecialchars($certificateId) ?></div>

        <div class="label">Participant Name</div>
        <div class="value"><?= htmlspecialchars($data['name']) ?></div>

        <div class="label">Event</div>
        <div class="value"><?= htmlspecialchars($data['event']) ?></div>

        <div class="label">Issued On</div>
        <div class="value"><?= htmlspecialchars($data['issued_on']) ?></div>

        <div class="label">Institution</div>
        <div class="value"><?= htmlspecialchars($data['college']) ?></div>

    <?php else: ?>
        <h3 class="error">❌ Invalid Certificate</h3>
        <p>This certificate ID does not exist or is not valid.</p>
    <?php endif; ?>
</div>

</body>
</html>
