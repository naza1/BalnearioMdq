<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	$query = "SELECT * FROM `carpas` where tipo_contrato='diario' order by date_added";
	
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(20,6,'Nro Carpa',1,0,'C',1);
	$pdf->Cell(60,6,'Nro. Cliente',1,0,'C',1);
	$pdf->Cell(35,6,'Ocupacion Actual',1,0,'C',1);
	$pdf->Cell(50,6,'Fecha',1,0,'C',1);
	$pdf->Cell(32,6,'Contrato',1,0,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(20,6,($row['numero_carpa']),1,0,'C');
		$pdf->Cell(60,6,$row['_id_cliente'],1,0,'C');
		$pdf->Cell(35,6,$row['ocupacion_actual'],1,0,'C');
		$pdf->Cell(50,6,$row['date_added'],1,0,'C');	
		$pdf->Cell(32,6,utf8_decode($row['tipo_contrato']),1,1,'C');
		
		
	}
	$pdf->Output();
?>
