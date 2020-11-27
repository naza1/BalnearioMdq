<?php
	
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('images/logodos.png', 5, 5, 30 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(80,10, 'Credencial de Acceso',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Temporada 2020/21',0,0,'C' );
		}		
	}
?>
