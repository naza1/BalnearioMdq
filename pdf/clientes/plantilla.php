<?php
	
	require_once 'fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('images/logo.png', 5, 5, 20 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Listado de Clientes por Orden Alfabetico',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>
