<?php
echo "hola";
require('../pdf/fpdf.php');
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
$pdf->Output("../recibos/"."_".date("Y-m-d-H-i-s").".pdf",'F');
?>