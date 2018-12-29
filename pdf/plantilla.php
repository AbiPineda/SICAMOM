<?php
	
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('images/ClinicaLogo.png', 37, 3, 80 );
			$this->SetFont('Arial','B',7);
			$this->Cell(1);
			$this->Ln(28);
			$this->Cell(59,5, utf8_decode('4º C.ORIENTE B. SAN FRANCISCO Nº 4-2, SAN VICENTE'),0,1,'C');
			
			$this->Cell(30,5, utf8_decode('TEL: 2393-0878  CEL: 7083-6625'),0,1,'C');
			$this->Ln(-10);
			$this->Cell(210,5, utf8_decode('PLAZA ANCALMO - LOCAL 7. 2º PLANTA'),0,1,'C');
			$this->Cell(200,5, utf8_decode('BULEVAR WALTER THILO DENINGER. ANTIGUO CUSCATLAN'),0,1,'C');

			$this->Cell(210,5, utf8_decode('TEL: 2352-5461  CEL: 7083-6625'),0,1,'C');

			$this->Ln(5);
			$this->Cell(100,5, utf8_decode('Paciente:'),0,1,'L');
			$this->Cell(100,12, utf8_decode('Médico:'),0,1,'L');

			$this->Ln(-15);
			$this->Cell(300,5, utf8_decode('Fecha: '),0,1,'C');

			$this->Ln(110);
			$this->Cell(100,5, utf8_decode('Próxima cita:'),0,1,'L');
			
			
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