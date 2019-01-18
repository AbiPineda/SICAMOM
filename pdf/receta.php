<?php
	include 'plantilla.php';
	include '../Conexion/conexion.php';

	$modificar=$_GET['ir'];

	$pacientito= mysqli_query($conexion,"SELECT
t_expediente.id_expediente,
t_paciente.pac_cnombre,
t_paciente.pac_capellidos,
t_medico.med_cnombre,
t_medico.med_capellidos,
t_consulta.con_receta
FROM
t_expediente
INNER JOIN t_paciente ON t_expediente.fk_paciente = t_paciente.id_paciente
INNER JOIN t_medico ON t_expediente.fk_medico = t_medico.idMedico
INNER JOIN t_consulta ON t_consulta.fk_expediente = t_expediente.id_expediente
WHERE t_expediente.id_expediente='$modificar' ");
            while ($fila = mysqli_fetch_array($pacientito)) {

            	 $nom=$fila['pac_cnombre']; 
            	 $ape=$fila['pac_capellidos'];
            	 $nomDr=$fila['med_cnombre'];
            	 $apeDr=$fila['med_capellidos'];

            	 $recetita=$fila['con_receta'];
                   
}

$sacar1 = mysqli_query($conexion, "SELECT * FROM t_consulta WHERE idconsulta=7");
while ($fila2 = mysqli_fetch_array($sacar1)) {
                
                 $consultita=$fila2['con_receta'];  
                 
             
               
                  
                 

	}



     date_default_timezone_set('America/El_Salvador');
     $fecha_actual=date("d/m/Y");                              

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
			$pdf->Cell(100,5, utf8_decode('Paciente:'.' '.$nom.' '.$ape),0,1,'L');
			
                
                 $pdf->Ln(0.5);
              //   $pdf->Cell(30,5, utf8_decode($fila['paciente']),0,0,'C');
                
                                     
	

			$pdf->Cell(100,12, utf8_decode('Médico:'.' '.$nomDr.' '.$apeDr),0,1,'L');

			$pdf->Ln(-10);
			$pdf->Cell(200,5, utf8_decode('Fecha: '),0,1,'C');
			$pdf->Ln(-5);
			$pdf->Cell(222,5, utf8_decode($fecha_actual),0,1,'C');

			$pdf->Ln(10);
			$pdf->SetFont('Arial','',10);
			$pdf->MultiCell(120,6, utf8_decode($recetita),1,'L',0,1); 

			$pdf->Ln(45);
			$pdf->Cell(100,5, utf8_decode('Próxima cita:'),0,1,'L');
	
	//$pdf->SetFillColor(232,232,232);
	//$pdf->SetFont('Arial','B',12);
	//$pdf->Cell(70,6,'ESTADO',1,0,'C',1);
	//$pdf->Cell(20,6,'ID',1,0,'C',1);
	//$pdf->Cell(70,6,'MUNICIPIO',1,1,'C',1);
	

	$pdf->SetFont('Arial','',10);
	
	
	
	
	$pdf->Output();
?>