<?php
require_once 'tcpdf/tcpdf.php';

$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 16);
$pdf->Cell(0, 10, 'TCPDF Browser Output Test');
$pdf->Output('test.pdf', 'I'); // I = inline (browser)
