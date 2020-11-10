<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	$query = "SELECT * FROM `integrantes` order by _id_cliente";
	
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(30,6,'Nro Cliente',1,0,'C',1);
	$pdf->Cell(60,6,'Nombre y Apellido',1,0,'C',1);
	$pdf->Cell(25,6,'D.N.I.',1,0,'C',1);
	$pdf->Cell(50,6,'Vinculo',1,0,'C',1);
	$pdf->Cell(32,6,'Telefono',1,0,'C',1);
	
	
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(30,6,($row['_id_cliente']),1,0,'C');
		$pdf->Cell(60,6,$row['nombre'],1,0,'C');
		$pdf->Cell(25,6,$row['dni'],1,0,'C');
		$pdf->Cell(50,6,$row['vinculo_nombre'],1,0,'C');	
		$pdf->Cell(32,6,utf8_decode($row['telefono']),1,1,'C');
	
	}
	$pdf->Output();
?>
