
<?php 
require('../fpdf.php');
require('../model.php');
 
 $post = getPostById($_GET['id']);	



$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(15,6,'Cliente',1,0,'C',1);
	$pdf->Cell(60,6,'Nombre y Apellido',1,0,'C',1);
	$pdf->Cell(30,6,'D.N.I',1,0,'C',1);
	 $pdf->Cell(25,6,'Telefono',1,1,'C',1);
	
	$pdf->Cell(15,6,utf8_decode($post['Id']),1,0,'C');
		$pdf->Cell(60,6,$post['_nombre'],1,0,'C');
		$pdf->Cell(30,6,$post['_dni'],1,0,'C');
		$pdf->Cell(25,6,utf8_decode($post['_telefono']),1,1,'C');

	    $pdf->Ln(10);
		$pdf->Cell(22,6,'Carpa',1,0,'C',1);
	    $pdf->Cell(23,6,'Contrato',1,0,'C',1);
		$pdf->Cell(25,6,'Cochera 1',1,0,'C',1);
	    $pdf->Cell(25,6,'Cochera 2',1,0,'C',1);
	    $pdf->Cell(35,6,'Patentes',1,1,'C',1);
		$pdf->Cell(22,6,$post['_id_carpa'],1,0,'C');
		$pdf->Cell(23,6,$post['_contrato'],1,0,'C');
		$pdf->Cell(25,6,$post['id_cochera1'],1,0,'C');
		$pdf->Cell(25,6,$post['id_cochera2'],1,0,'C');
		$pdf->Cell(35,6,utf8_decode($post['_patente_auto']),1,1,'C');
		
		
	
	
	
	





$pdf->Output();
?>
