<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	$query = "SELECT * FROM `clientes` order by _id_carpa";
	
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(10,6,'Nro',1,0,'C',1);
	$pdf->Cell(60,6,'Nombre y Apellido',1,0,'C',1);
	$pdf->Cell(12,6,'Carpa',1,0,'C',1);
	$pdf->Cell(20,6,'Contrato',1,0,'C',1);
	$pdf->Cell(20,6,'Ocupacion',1,0,'C',1);
	$pdf->Cell(25,6,'Cochera 1',1,0,'C',1);
	$pdf->Cell(25,6,'Cochera 2',1,0,'C',1);
	$pdf->Cell(25,6,'Telefono',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(10,6,utf8_decode($row['Id']),1,0,'C');
		$pdf->Cell(60,6,$row['_nombre'],1,0,'C');
		$pdf->Cell(12,6,$row['_id_carpa'],1,0,'C');
		$pdf->Cell(20,6,$row['_contrato'],1,0,'C');
		$pdf->Cell(20,6,$row[''],1,0,'C');
		$pdf->Cell(25,6,$row['id_cochera1'],1,0,'C');
		$pdf->Cell(25,6,$row['id_cochera2'],1,0,'C');
		$pdf->Cell(25,6,utf8_decode($row['_telefono']),1,1,'C');
	}
	$pdf->Output();
?>
