<?php
	include 'plantilla2.php';
	include '../Conexion/conexion.php';

$modificar=$_GET['ir'];

	$pacientito= mysqli_query($conexion,"SELECT
t_expediente.id_expediente,
t_paciente.pac_cnombre,
t_paciente.pac_capellidos,
t_paciente.pac_ffecha_nac,
t_expediente.codigo,
t_medico.med_cnombre,
t_medico.med_capellidos

FROM
t_expediente
INNER JOIN t_paciente ON t_expediente.fk_paciente = t_paciente.id_paciente
INNER JOIN t_medico ON t_expediente.fk_medico = t_medico.idMedico
WHERE t_expediente.id_expediente='$modificar' ");
            while ($fila = mysqli_fetch_array($pacientito)) {

            	 $nom=$fila['pac_cnombre']; 
            	 $ape=$fila['pac_capellidos'];
            	 $fechaN=$fila['pac_ffecha_nac'];
            	 $nomDr=$fila['med_cnombre'];
            	 $apeDr=$fila['med_capellidos'];
            	 $Cod=$fila['codigo'];
            	 $partes = explode('-', $fechaN);
                $_fecha = "{$partes[2]}-{$partes[1]}-{$partes[0]}"; 

//fecha actual
    date_default_timezone_set('America/El_Salvador');
    $dia = date("d");
    $mes = date("m");
    $ano = date("Y");

//fecha de nacimiento

//si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual

if (($partes[1] == $mes) && ($partes[2] > $dia)) {
$ano=($ano-1); }

//si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual

if ($partes[1] > $mes) {
$ano=($ano-1);}

//ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad

$edad=($ano-$partes[0]);
                   

}

	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	date_default_timezone_set('America/El_Salvador');
     $fecha_actual=date("d/m/Y");       


	$pdf->Ln(5);
	$pdf->SetX(75);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(100,5, utf8_decode('HOJA DE REFERENCIA MÉDICA'),0,1,'L');		
   
   $pdf->Ln(10);

   			$pdf->Cell(145,12, utf8_decode('Paciente:'.' '.$nom.' '.$ape.'          '.'Edad:'.' '.$edad.' '.'años'.'          '.'Nº de expedente:'.' '.$Cod),0,1,'L');

			$pdf->Cell(100,12, utf8_decode('Médico:'.' '.$nomDr.' '.$apeDr),0,1,'L');

			$pdf->Ln(-30);
			$pdf->Cell(330,5, utf8_decode('Fecha: '.' '.$fecha_actual),0,1,'C');
			$pdf->Ln(-5);
		//	$pdf->Cell(335,5, utf8_decode($fecha_actual),0,1,'C');

			$pdf->Ln(200);
			$pdf->Cell(190,5, utf8_decode('Firma:_______________________'),0,1,'C');
	
	

	$pdf->SetFont('Arial','',10);
	
	
	
	
	$pdf->Output();
?>