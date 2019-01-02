<?php
	include 'plantilla2.php';
	include '../Conexion/conexion.php';


	$sacar1 = mysqli_query($conexion, "SELECT * FROM t_medico");
     
     $fecha_actual=date("d/m/Y");                              

	
	
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(100,5, utf8_decode('JUSTIFICANTE MÉDICO'),0,1,'L');		
   
			$pdf->Cell(100,12, utf8_decode('Médico:'),0,1,'L');

			while ($fila = mysqli_fetch_array($sacar1)) {
                 $id=$fila['idMedico'];
                 $nom=$fila['med_cnombre'];  
                 $apellido=$fila['med_capellidos'];
                 $pdf->Ln(-8.5);
                 $pdf->Cell(65,5, utf8_decode($fila['med_cnombre']),0,1,'C');
                                       
	}

	$pdf->Cell(100,12, utf8_decode('Paciente:'),0,1,'L');

			$pdf->Ln(-25);
			$pdf->Cell(300,5, utf8_decode('Fecha: '),0,1,'C');
			$pdf->Ln(-5);
			$pdf->Cell(335,5, utf8_decode($fecha_actual),0,1,'C');

			$pdf->Ln(220);
			$pdf->Cell(190,5, utf8_decode('Firma:_______________________'),0,1,'C');
	
	

	$pdf->SetFont('Arial','',10);
	
	
	
	
	$pdf->Output();
?>