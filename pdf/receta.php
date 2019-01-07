<?php
	include 'plantilla.php';
	include '../Conexion/conexion.php';


	$sacar1 = mysqli_query($conexion, "SELECT * FROM t_medico");
     
     $fecha_actual=date("d/m/Y");                              

		
        $sacar = mysqli_query($conexion, "SELECT * from receta");
           
 

	
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('P','A5');

	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(59,5, utf8_decode('4º C.ORIENTE B. SAN FRANCISCO Nº 4-2, SAN VICENTE'),0,1,'C');		
    $pdf->Cell(30,5, utf8_decode('TEL: 2393-0878  CEL: 7083-6625'),0,1,'C');

    $pdf->Ln(-10);
			$pdf->Cell(210,5, utf8_decode('PLAZA ANCALMO - LOCAL 7. 2º PLANTA'),0,1,'C');
			$pdf->Cell(200,5, utf8_decode('BULEVAR WALTER THILO DENINGER. ANTIGUO CUSCATLAN'),0,1,'C');

			$pdf->Cell(210,5, utf8_decode('TEL: 2352-5461  CEL: 7083-6625'),0,1,'C');

			$pdf->Ln(5);
			$pdf->Cell(100,5, utf8_decode('Paciente:'),0,1,'L');
			while ($fila = mysqli_fetch_array($sacar)) {
                 $id=$fila['idreceta'];
                 $nom=$fila['paciente'];  
                 
                 $pdf->Ln(0.5);
                 $pdf->Cell(30,5, utf8_decode($fila['paciente']),0,0,'C');
                
                                     
	}

			$pdf->Cell(100,12, utf8_decode('Médico:'),0,1,'L');

			while ($fila = mysqli_fetch_array($sacar1)) {
                 $id=$fila['idMedico'];
                 $nom=$fila['med_cnombre'];  
                 $apellido=$fila['med_capellidos'];
                 $pdf->Ln(0.5);
                 $pdf->Cell(30,5, utf8_decode($fila['med_cnombre']),0,0,'C');
                 $pdf->Cell(1);
                 $pdf->Cell(-18,5, utf8_decode($fila['med_capellidos']),0,0,'C');                        
	}

			$pdf->Ln(-10);
			$pdf->Cell(200,5, utf8_decode('Fecha: '),0,1,'C');
			$pdf->Ln(-5);
			$pdf->Cell(222,5, utf8_decode($fecha_actual),0,1,'C');

			$pdf->Ln(110);
			$pdf->Cell(100,5, utf8_decode('Próxima cita:'),0,1,'L');
	
	//$pdf->SetFillColor(232,232,232);
	//$pdf->SetFont('Arial','B',12);
	//$pdf->Cell(70,6,'ESTADO',1,0,'C',1);
	//$pdf->Cell(20,6,'ID',1,0,'C',1);
	//$pdf->Cell(70,6,'MUNICIPIO',1,1,'C',1);
	

	$pdf->SetFont('Arial','',10);
	
	
	
	
	$pdf->Output();
?>