<?php
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	include 'pdf/plantilla.php';
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
  require_once("../model.php");
  $id= $_POST['Id'];
  
  
  if (isset($_GET['Id']))
  {
    $id=intval($_GET['Id']);
    
    if ($resultado=mysqli_query($conn,"SELECT FROM clientes WHERE id='".$id."'")){
   
	
	
	$resultado = $mysqli->query($query);
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	
	$pdf->Cell(15,6,'Cliente',1,0,'C',1);
	$pdf->Cell(60,6,'Nombre y Apellido',1,0,'C',1);
	$pdf->Cell(30,6,'D.N.I',1,0,'C',1);
	 $pdf->Cell(25,6,'Telefono',1,1,'C',1);
	
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(15,6,utf8_decode($row['Id']),1,0,'C');
		$pdf->Cell(60,6,$row['_nombre'],1,0,'C');
		$pdf->Cell(30,6,$row['_dni'],1,0,'C');
		$pdf->Cell(25,6,utf8_decode($row['_telefono']),1,1,'C');

	    $pdf->Ln(20);
		$pdf->Cell(22,6,'Carpa',1,0,'C',1);
	    $pdf->Cell(23,6,'Contrato',1,0,'C',1);
		$pdf->Cell(25,6,'Cochera 1',1,0,'C',1);
	    $pdf->Cell(25,6,'Cochera 2',1,0,'C',1);
	    $pdf->Cell(35,6,'Patentes',1,1,'C',1);
		$pdf->Cell(22,6,$row['_id_carpa'],1,0,'C');
		$pdf->Cell(23,6,$row['_contrato'],1,0,'C');
		$pdf->Cell(25,6,$row['id_cochera1'],1,0,'C');
		$pdf->Cell(25,6,$row['id_cochera2'],1,0,'C');
		$pdf->Cell(35,6,utf8_decode($row['_patente_auto']),1,1,'C');
		$pdf->Output();
		
	}
	
}

}

?>

