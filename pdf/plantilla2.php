<?php
	
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('images/ClinicaLogo.png', 5, 3, 80 );
			$this->Image('images/logonuevo.png', 120, 10, 80 );
			$this->SetFont('Arial','B',7);
			$this->Cell(1);
			
			
			
			$this->Ln(30);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>