<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	$query = "SELECT * FROM `cocheras` where tipo_contrato='diario' order by id_cliente";
	
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(25,6,'Nro Cochera',1,0,'C',1);
	$pdf->Cell(45,6,'Nro. Cliente',1,0,'C',1);
	$pdf->Cell(35,6,'Tipo de Cochera',1,0,'C',1);
	$pdf->Cell(50,6,'Contrato',1,0,'C',1);
	$pdf->Cell(42,6,'Fecha',1,0,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(25,6,($row['numero_cochera']),1,0,'C');
		$pdf->Cell(45,6,$row['id_cliente'],1,0,'C');
		$pdf->Cell(35,6,$row['cochera_tipop'],1,0,'C');
		$pdf->Cell(50,6,$row['tipo_contrato'],1,0,'C');	
		$pdf->Cell(42,6,utf8_decode($row['date_added']),1,1,'C');
		
		
	}
	$pdf->Output();
?>
