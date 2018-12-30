<?php
	
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('images/ClinicaLogo.png', 35, 3, 80 );
			$this->SetFont('Arial','B',7);
			$this->Cell(1);
			
			
			
			$this->Ln(30);
		}
		
		function Footer()
		{
			$this->SetY(-20);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,5, utf8_decode('-Atención de partos - Embarazo de alto riesgo - Estudio de Fertilidad - masculina y femenina'),0,1,'C' );
			$this->Cell(0,5, utf8_decode('-Cirugía Ginecológica: Útero y ovarios - Mamas - Ultrasonografía de embarazo, útero, ovarios y mamas'),0,1,'C' );
			$this->Cell(0,5, utf8_decode('-Detección Precoz y Tratamiento de Cáncer Cérvico y de mama'),0,1,'C' );
		}		
	}
?>