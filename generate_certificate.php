<?php
require_once 'tcpdf/tcpdf.php';
require_once 'phpqrcode/qrlib.php';

// ---------------- DATA ----------------
$name = "Sample Participant";
$event = "AI Kshetra 2025";
$certificateId = "AIK25-PART-TEST001";
$verifyUrl = "http://localhost/ak/verify.php?id=" . $certificateId;

// ---------------- QR (TEMP FILE) ----------------
$tempQrPath = sys_get_temp_dir() . DIRECTORY_SEPARATOR . $certificateId . '.png';

QRcode::png(
    $verifyUrl,
    $tempQrPath,
    QR_ECLEVEL_H,
    6
);

// ---------------- PDF ----------------
$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

// Disable default stuff
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(0, 0, 0);
$pdf->SetAutoPageBreak(false, 0);

$pdf->AddPage();

// ---------------- BACKGROUND IMAGE ----------------
$bgPath = __DIR__ . '/assets/certificate_bg.jpg';

// Full A4 landscape size: 297 x 210 mm
$pdf->Image(
    $bgPath,
    0,      // x
    0,      // y
    297,    // width
    210,    // height
    '',     // type (auto)
    '',     // link
    '',     // align
    false,  // resize
    300,    // dpi
    '',     // palign
    false,  // ismask
    false,  // imgmask
    0       // border
);

// ---------------- TEXT CONTENT ----------------

// Participant Name (adjust Y as needed)
$pdf->SetFont('helvetica', 'B', 34);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(0, 95);
$pdf->Cell(297, 10, $name, 0, 1, 'C');

// Description text
$pdf->SetFont('helvetica', '', 18);
$pdf->SetXY(0, 120);
$pdf->MultiCell(
    297,
    10,
    "has successfully participated in\n$event",
    0,
    'C'
);

// Certificate ID (bottom-left)
$pdf->SetFont('helvetica', '', 10);
$pdf->SetXY(20, 185);
$pdf->Cell(0, 0, "Certificate ID: $certificateId");

// QR Code (bottom-right)
$pdf->Image($tempQrPath, 245, 155, 28, 28);

// ---------------- OUTPUT ----------------
$pdf->Output($certificateId . '.pdf', 'I');
