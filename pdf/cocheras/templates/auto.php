
<?php 
require('../fpdf.php');
require('../model.php');
 
 $post = getPostById($_GET['id']);	



$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(65,10,'Cliente',1,0,'C',1);
	$pdf->Cell(65,10,'Nombre y Apellido',1,0,'C',1);
	$pdf->Ln(15);
	$pdf->Cell(65,10,utf8_decode($post['Id']),1,0,'C');
    $pdf->Cell(65,10,$post['_nombre'],1,0,'C');
	    $pdf->Ln(20);
		$pdf->Cell(65,10,'Carpa',1,0,'C',1);
	    $pdf->Cell(65,10,'Contrato',1,0,'C',1);
	    $pdf->Ln(15);
		$pdf->Cell(65,10,$post['_id_carpa'],1,0,'C');
		$pdf->Cell(65,10,$post['_contrato'],1,0,'C');
		 $pdf->Ln(20);
		 $pdf->SetFont('Arial','B',15);
		$pdf->Cell(65,15,'Cochera 1',1,0,'C',1);
	    $pdf->Cell(65,15,'Cochera 2',1,0,'C',1);
	     $pdf->Ln(15);
	    $pdf->Cell(65,15,$post['id_cochera1'],1,0,'C');
		$pdf->Cell(65,15,$post['id_cochera2'],1,0,'C');
		$pdf->Ln(20);
	    $pdf->Cell(130,15,'Patentes',1,1,'C',1);
		$pdf->Cell(130,15,utf8_decode($post['_patente_auto']),1,1,'C');
		$pdf->Ln(10);
		$pdf->Cell(130,6,'Observaciones',1,1,'C',1);
		$pdf->Cell(130,6,$post['_pago'],1,0,'C');
		
	
	
	
	





$pdf->Output(I,'credencial.pdf');
?>
