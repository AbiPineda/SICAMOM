<?php
	include 'plantilla3.php';
	include '../Conexion/conexion.php';

$principal= mysqli_query($conexion,"SELECT*FROM t_examenes INNER JOIN t_consulta ON t_examenes.fk_consulta=t_consulta.idconsulta
INNER JOIN t_expediente ON t_consulta.fk_expediente=t_expediente.id_expediente
INNER JOIN t_paciente ON t_expediente.fk_paciente=t_paciente.id_paciente");

while ($aux= mysqli_fetch_array($principal)){
    //comenzar a sacar los de los examenes
    $hema=$aux['hematologia'];
    //********************
    $paciente=$aux['pac_cnombre'];
    $ape=$aux['pac_capellidos'];
    
}
///que comience el juego*** para comenzar a sacar las pociones y comparar
//para hematologia
  $hemaPivote= explode(",",$hema);
//  $hemaPivote[0];$hemaPivote[1];$hemaPivote[2];$hemaPivote[3];$hemaPivote[4];$hemaPivote[5];$hemaPivote[6];
//  $hemaPivote[7];$hemaPivote[8];$hemaPivote[9];$hemaPivote[10];$hemaPivote[11];$hemaPivote[12];$hemaPivote[13];
//  $hemaPivote[14];$hemaPivote[15];$hemaPivote[16];$hemaPivote[17];$hemaPivote[18];$hemaPivote[19];$hemaPivote[20];
//  $hemaPivote[21];

///
	$sacar1 = mysqli_query($conexion, "SELECT * FROM t_medico");
     
     $fecha_actual=date("d/m/Y");                              

	
	
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(100,5, utf8_decode('Paciente: '.$paciente.' '.$ape),0,1,'L');		
   
			$pdf->Cell(100,12, utf8_decode('Médico:'),0,1,'L');

			while ($fila = mysqli_fetch_array($sacar1)) {
                 $id=$fila['idMedico'];
                 $nom=$fila['med_cnombre'];  
                 $apellido=$fila['med_capellidos'];
                 $pdf->Ln(-8.5);
                 $pdf->Cell(65,5, utf8_decode($fila['med_cnombre']),0,1,'C');
                                       
	}

	;
	$tigre=1;

			$pdf->Ln(-15);
			$pdf->Cell(300,5, utf8_decode('Fecha: '),0,1,'C');
			$pdf->Ln(-5);
			$pdf->Cell(335,5, utf8_decode($fecha_actual),0,1,'C');
			$pdf->Ln(5);
			$pdf->Cell(300,5, utf8_decode('Edad: '.$hemaPivote[7]),0,1,'C');
			$pdf->Ln(5);
			//Encabezado
			$pdf->SetFillColor(0,186,211);
			$pdf->SetFont('Arial','B',12);

			$pdf->Cell(48,6,utf8_decode('HEMATOLOGÍA'),1,1,'C',1);
			//Lista de examenes
			$pdf->SetFont('Arial','',8);
			if ($hemaPivote[0]!=null) {
				//$pdf->SetTextColor(182, 0, 61); esto tiene que quitar en lo demas xq da problemas
                            //cuando entra el if pone todo del mismo color no pone el que queremos sino que todo
                            //y mejor rellene el cuadro para indicar que examen se hizo SetFillColor tiene que usar
                                $pdf->SetFillColor(175, 122, 197 );
				$pdf->Cell(48,6, utf8_decode('Hemograma'),1,1,'C',1);
			} else {
				$pdf->Cell(48,6, utf8_decode('Hemograma'),1,1,'C');
			}

			if ($hemaPivote[1]!=null) {
				 $pdf->SetFillColor(175, 122, 197 );
				$pdf->Cell(48,6, utf8_decode('Htc. y Hb.'),1,1,'C',1);
			} else {
				$pdf->Cell(48,6, utf8_decode('Htc. y Hb.'),1,1,'C');
			}

			if ($hemaPivote[2]!=null) {
				 $pdf->SetFillColor(175, 122, 197 );
				$pdf->Cell(48,6, utf8_decode('Leucograma'),1,1,'C',1);
			} else {
				$pdf->Cell(48,6, utf8_decode('Leucograma'),1,1,'C');
			}

			if ($hemaPivote[3]!=null) {
				$pdf->SetFillColor(175, 122, 197 );
				$pdf->Cell(48,6, utf8_decode('Plaquetas'),1,1,'C',1);
			} else {
				$pdf->Cell(48,6, utf8_decode('Plaquetas'),1,1,'C');
			}

			if ($hemaPivote[4]!=null) {
				$pdf->SetFillColor(175, 122, 197 );
				$pdf->Cell(48,6, utf8_decode('Reticulocitos'),1,1,'C',1);
			} else {
				$pdf->Cell(48,6, utf8_decode('Reticulocitos'),1,1,'C');
			}

			if ($hemaPivote[5]!=null) {
				$pdf->SetFillColor(175, 122, 197 );
				$pdf->Cell(48,6, utf8_decode('Frotis Sangre Periférica'),1,1,'C',1);
			} else {
				$pdf->Cell(48,6, utf8_decode('Frotis Sangre Periférica'),1,1,'C');
			}

			if ($hemaPivote[6]!=null) {
				$pdf->SetFillColor(175, 122, 197 );
				$pdf->Cell(48,6, utf8_decode('Eritrosedimentación'),1,1,'C',1);
			} else {
				$pdf->Cell(48,6, utf8_decode('Eritrosedimentación'),1,1,'C');
			}

			if ($hemaPivote[7]!=null) {
				$pdf->SetFillColor(175, 122, 197 );
				$pdf->Cell(48,6, utf8_decode('Celulas L.E'),1,1,'C',1);
                                //aqui encontre en error kevin puso asi $pdf->Cell(48,6, utf8_decode('Celulas L.E'),1,1,'C');
                                // en todos y por eso tiene que agregar un 1 al final para que le rrellene sino pasara como
                                //yo buscando el error y no lo va hallar es asi $pdf->Cell(48,6, utf8_decode('Celulas L.E'),1,1,'C',1);
                                //ojo pero ese 1 solo va donde queremos rrellenar en el otro dejelo como estaba
                                //observe bien lo que e hecho y compare
			} else {
				$pdf->Cell(48,6, utf8_decode('Celulas L.E'),1,1,'C');
			}

			if ($hemaPivote[8]!=null) {
				$pdf->SetFillColor(175, 122, 197 );
				$pdf->Cell(48,6, utf8_decode('Celulas Falciformes'),1,1,'C',1);
			} else {
				$pdf->Cell(48,6, utf8_decode('Celulas Falciformes'),1,1,'C');
			}

			if ($hemaPivote[9]!=null) {
				$pdf->SetFillColor(175, 122, 197 );
				$pdf->Cell(48,6, utf8_decode('Recuento Eosinofilos en Sangre'),1,1,'C',1);
			} else {
				$pdf->Cell(48,6, utf8_decode('Recuento Eosinofilos en Sangre'),1,1,'C');
			}

			if ($hemaPivote[10]!=null) {
				$pdf->SetFillColor(175, 122, 197 );
				$pdf->Cell(48,6, utf8_decode('Recuento Eosinofilos Nasal'),1,1,'C',1);
			} else {
				$pdf->Cell(48,6, utf8_decode('Recuento Eosinofilos Nasal'),1,1,'C');
			}

			if ($hemaPivote[11]!=null) {
				$pdf->SetFillColor(175, 122, 197 );
				$pdf->Cell(48,6, utf8_decode('Tiempo Sangramiento'),1,1,'C',1);
			} else {
				$pdf->Cell(48,6, utf8_decode('Tiempo Sangramiento'),1,1,'C');
			}

			if ($hemaPivote[12]!=null) {
				$pdf->SetFillColor(175, 122, 197 );
				$pdf->Cell(48,6, utf8_decode('Retracción de Coágulo'),1,1,'C',1);
			} else {
				$pdf->Cell(48,6, utf8_decode('Retracción de Coágulo'),1,1,'C');
			}

			if ($hemaPivote[13]!=null) {
				$pdf->SetFillColor(175, 122, 197 );
				$pdf->Cell(48,6, utf8_decode('Tiempo de Protrombina'),1,1,'C',1);
			} else {
				$pdf->Cell(48,6, utf8_decode('Tiempo de Protrombina'),1,1,'C');
			}

			if ($hemaPivote[14]!=null) {
				$pdf->SetFillColor(175, 122, 197 );
				$pdf->Cell(48,6, utf8_decode('Tiempo Parcial de Tromboplastina'),1,1,'C',1);
			} else {
				$pdf->Cell(48,6, utf8_decode('Tiempo Parcial de Tromboplastina'),1,1,'C');
			}

			if ($hemaPivote[15]!=null) {
				$pdf->SetFillColor(175, 122, 197 );
				$pdf->Cell(48,6, utf8_decode('Tiempo de Coagulación'),1,1,'C',1);
			} else {
				$pdf->Cell(48,6, utf8_decode('Tiempo de Coagulación'),1,1,'C');
			}

			if ($hemaPivote[16]!=null) {
				$pdf->SetFillColor(175, 122, 197 );
				$pdf->Cell(48,6, utf8_decode('Fibrinógeno'),1,1,'C',1);
			} else {
				$pdf->Cell(48,6, utf8_decode('Fibrinógeno'),1,1,'C');
			}

			if ($hemaPivote[17]!=null) {
				$pdf->SetFillColor(175, 122, 197 );
				$pdf->Cell(48,6, utf8_decode('Grupo y HR'),1,1,'C',1);
			} else {
				$pdf->Cell(48,6, utf8_decode('Grupo y HR'),1,1,'C');
			}

			if ($hemaPivote[18]!=null) {
				$pdf->SetFillColor(175, 122, 197 );
				$pdf->Cell(48,6, utf8_decode('Prueba Cruzada'),1,1,'C',1);
			} else {
				$pdf->Cell(48,6, utf8_decode('Prueba Cruzada'),1,1,'C');
			}

			if ($hemaPivote[19]!=null) {
				$pdf->SetFillColor(175, 122, 197 );
				$pdf->Cell(48,6, utf8_decode('Prueba de Coombs'),1,1,'C',1);
			} else {
				$pdf->Cell(48,6, utf8_decode('Prueba de Coombs'),1,1,'C');
			}

			if ($hemaPivote[20]!=null) {
				$pdf->SetFillColor(175, 122, 197 );
				$pdf->Cell(48,6, utf8_decode('Directo e indirecto'),1,1,'C',1);
			} else {
				$pdf->Cell(48,6, utf8_decode('Directo e indirecto'),1,1,'C');
			}

			//Encabezado
			$pdf->SetFillColor(0,186,211);
			$pdf->SetFont('Arial','B',12);

			$pdf->Cell(48,6,utf8_decode('QUÍMICA'),1,1,'C',1);

			//Lista de examenes
			$pdf->SetFont('Arial','',8);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(48,6, utf8_decode('Glucosa'),1,1,'C');
			} else {
				$pdf->Cell(48,6, utf8_decode('Glucosa'),1,1,'C');
			}

			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(48,6, utf8_decode('Tol.Glucosa 4 Horas (Hipoglicemia)'),1,1,'C');
			} else {
				$pdf->Cell(48,6, utf8_decode('Tol.Glucosa 4 Horas (Hipoglicemia)'),1,1,'C');
			}

			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(48,6, utf8_decode('Glu Post Pandrial'),1,1,'C');
			} else {
				$pdf->Cell(48,6, utf8_decode('Glucosa Post Pandrial'),1,1,'C');
			}

			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(48,6, utf8_decode('Albumina'),1,1,'C');
			} else {
				$pdf->Cell(48,6, utf8_decode('Albumina'),1,1,'C');
			}

			
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->MultiCell(48,6, utf8_decode('Tolerancia Post-Ingesta 75grs. de Glucosa 2hrs.'),1,'L',0,1);
			} else {
				$pdf->MultiCell(48,6, utf8_decode('Tolerancia Post-Ingesta 75grs. de Glucosa 2hrs.'),1,'L',0,1);
			}
			

			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(48,6, utf8_decode('Hb. Glicosilada AIC%'),1,1,'C');
			} else {
				$pdf->Cell(48,6, utf8_decode('Hb. Glicosilada AIC%'),1,1,'C');
			}

			$pdf->SetXY(58,58.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Test O Sullivan'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Test O Sullivan'),1,1,'C');
			}

			//$pdf->SetXY(58,58.5);  
			//$pdf->SetXY(58,70.5);

			$pdf->SetXY(58,64.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Nitrógeno Ureico'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Nitrógeno Ureico'),1,1,'C');
			}

			$pdf->SetXY(58,70.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Creatinina'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Creatinina'),1,1,'C');
			}

			$pdf->SetXY(58,76.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Depuración de Creatinina'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Depuración de Creatinina'),1,1,'C');
			}

			$pdf->SetXY(58,82.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Ácido Urico'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Ácido Urico'),1,1,'C');
			}

			$pdf->SetXY(58,88.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Urea'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Urea'),1,1,'C');
			}
			$pdf->SetXY(58,94.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Cloro'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Cloro'),1,1,'C');
			}
			$pdf->SetXY(58,100.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Sodio'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Sodio'),1,1,'C');
			}
			$pdf->SetXY(58,106.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Potasio'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Potasio'),1,1,'C');
			}

			$pdf->SetXY(58,112.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Calcio'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Calcio'),1,1,'C');
			}

			$pdf->SetXY(58,118.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Fosforo'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Fosforo'),1,1,'C');
			}

			$pdf->SetXY(58,124.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Magnesio'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Magnesio'),1,1,'C');
			}

			$pdf->SetXY(58,130.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Colesterol'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Colesterol'),1,1,'C');
			}

			$pdf->SetXY(58,136.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Trigliceridos'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Trigliceridos'),1,1,'C');
			}

			$pdf->SetXY(58,142.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Lipidos Totales'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Lipidos Totales'),1,1,'C');
			}

			$pdf->SetXY(58,148.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Lipoproteinas Alta-Baja'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Lipoproteinas Alta-Baja'),1,1,'C');
			}

			$pdf->SetXY(58,154.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Densidad HDL-LDL'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Densidad HDL-LDL'),1,1,'C');
			}

			$pdf->SetXY(58,160.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Proteínas Totales'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Proteínas Totales'),1,1,'C');
			}

			$pdf->SetXY(58,166.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('TGO'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('TGO'),1,1,'C');
			}

			$pdf->SetXY(58,172.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('TGP'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('TGP'),1,1,'C');
			}

			$pdf->SetXY(58,178.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Bilirrubina'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Bilirrubina'),1,1,'C');
			}

			$pdf->SetXY(58,184.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Fosfasata Alcalina'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Fosfasata Alcalina'),1,1,'C');
			}

			$pdf->SetXY(58,190.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Amilasa'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Amilasa'),1,1,'C');
			}

			$pdf->SetXY(58,196.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Lipasa'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Lipasa'),1,1,'C');
			}

			$pdf->SetXY(58,202.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('LDH'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('LDH'),1,1,'C');
			}

			$pdf->SetXY(58,208.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('CPK'),1,0,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('CPK'),1,0,'C');
			}

			$pdf->SetXY(58,220.5);

			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('T3'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('T3'),1,1,'C');
			}
			$pdf->SetXY(58,226.5);

			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('T4'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('T4'),1,1,'C');
			}

			$pdf->SetXY(58,232.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('T.S.H'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('T.S.H'),1,1,'C');
			}

			$pdf->SetXY(105,58.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Hormona de crecimiento'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Hormona de crecimiento'),1,1,'C');
			}

			//Encabezado
			$pdf->SetXY(58,214.5);
			$pdf->SetFillColor(0,186,211);
			$pdf->SetFont('Arial','B',12);

			$pdf->Cell(47,6,utf8_decode('ENDOCRINOLOGÍA'),1,1,'C',1);

			//Lista de examenes
			$pdf->SetFont('Arial','',8);
			

			$pdf->SetXY(105,64.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Hormona Paratiroidea'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Hormona Paratiroidea'),1,1,'C');
			}

			$pdf->SetXY(105,70.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('C-Terminal'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('C-Terminal'),1,1,'C');
			}

			$pdf->SetXY(105,76.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Progesterona'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Progesterona'),1,1,'C');
			}

			$pdf->SetXY(105,82.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Estradiol'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Estradiol'),1,1,'C');
			}

			$pdf->SetXY(105,88.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Testosterona'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Testosterona'),1,1,'C');
			}
			$pdf->SetXY(105,94.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('LH'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('LH'),1,1,'C');
			}
			$pdf->SetXY(105,100.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('FSH'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('FSH'),1,1,'C');
			}

			$pdf->SetXY(105,106.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Prolactina'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Prolactina'),1,1,'C');
			}

			$pdf->SetXY(105,112.5);
			//Encabezado
			$pdf->SetFillColor(0,186,211);
			$pdf->SetFont('Arial','B',12);

			$pdf->Cell(47,6,utf8_decode('INMUNOLOGÍA'),1,1,'C',1);

			//Lista de examenes
			$pdf->SetFont('Arial','',8);
			$pdf->SetXY(105,64.5);

			$pdf->SetXY(105,118.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Antigenos Febriles'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Antigenos Febriles'),1,1,'C');
			}

			$pdf->SetXY(105,124.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Antiestreptolisima'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Antiestreptolisima'),1,1,'C');
			}

			$pdf->SetXY(105,130.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Proteína C Reactiva'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Proteína C Reactiva'),1,1,'C');
			}

			$pdf->SetXY(105,136.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Latex R.A'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Latex R.A'),1,1,'C');
			}

			$pdf->SetXY(105,142.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('V.D.R.L'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('V.D.R.L'),1,1,'C');
			}

			$pdf->SetXY(105,148.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('FTA-ABS'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('FTA-ABS'),1,1,'C');
			}

			$pdf->SetXY(105,154.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Proteínas Totales'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Proteínas Totales'),1,1,'C');
			}

			$pdf->SetXY(105,160.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('H.I.V'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('H.I.V'),1,1,'C');
			}

			$pdf->SetXY(105,166.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Gravindex'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Gravindex'),1,1,'C');
			}

			$pdf->SetXY(105,172.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Prueba de Embarazo en sangre'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Prueba de Embarazo en sangre'),1,1,'C');
			}

			$pdf->SetXY(105,178.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Anti RH'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Anti RH'),1,1,'C');
			}

			$pdf->SetXY(105,184.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Anti Hepatitis C'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Anti Hepatitis C'),1,1,'C');
			}

			$pdf->SetXY(105,190.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Anti c. Antinucleares'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Anti c. Antinucleares'),1,1,'C');
			}

			$pdf->SetXY(105,196.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Anti DNA'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Anti DNA'),1,1,'C');
			}

			$pdf->SetXY(105,202.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Lupus Anticuagulante'),1,0,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Lupus Anticuagulante'),1,0,'C');
			}


			$pdf->SetXY(105,208.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Antic. Anticardiolipinas'),1,0,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Antic. Anticardiolipinas'),1,0,'C');
			}

			$pdf->SetXY(105,214.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Antitoxoplasmosis IgM'),1,0,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Antitoxoplasmosis IgM'),1,0,'C');
			}			
			

			$pdf->SetXY(105,220.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Antitoxoplasmosis IgG'),1,0,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Antitoxoplasmosis IgG'),1,0,'C');
			}

			$pdf->SetXY(105,226.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('PSA'),1,0,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('PSA'),1,0,'C');
			}		

			$pdf->SetXY(105,232.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Helicobacter Pylori en Sangre'),1,0,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Helicobacter Pylori en Sangre'),1,0,'C');
			}	
			
			$pdf->SetXY(152,58.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Helicobacter Pylori en Heces'),1,0,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Helicobacter Pylori en Heces'),1,0,'C');
			}

			//Encabezado
			$pdf->SetXY(152,64.5);
			$pdf->SetFillColor(0,186,211);
			$pdf->SetFont('Arial','B',12);

			$pdf->Cell(47,6,utf8_decode('HECES'),1,1,'C',1);

			//Lista de examenes
			$pdf->SetFont('Arial','',8);
			$pdf->SetXY(152,70.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Examen General'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Examen General'),1,1,'C');
			}

			$pdf->SetXY(152,76.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Sangre oculta'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Sangre oculta'),1,1,'C');
			}

			$pdf->SetXY(152,82.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->MultiCell(47,6, utf8_decode('Grasa en heces 24 Hrs. Cuantitativa'),1,'L',0,1);
			} else {
				$pdf->MultiCell(47,6, utf8_decode('Grasa en heces 24 Hrs. Cuantitativa'),1,'L',0,1);
			}

			$pdf->SetXY(152,94.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Azul de Metileno en Heces'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Azul de Metileno en Heces'),1,1,'C');
			}

			$pdf->SetXY(152,100.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Sustancias Reducoras'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Sustancias Reducoras'),1,1,'C');
			}

			//Encabezado
			$pdf->SetXY(152,106.5);
			$pdf->SetFillColor(0,186,211);
			$pdf->SetFont('Arial','B',12);

			$pdf->Cell(47,6,utf8_decode('ORINA'),1,1,'C',1);

			//Lista de examenes
			$pdf->SetFont('Arial','',8);
			$pdf->SetXY(152,112.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Examen General'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Examen General'),1,1,'C');
			}

			$pdf->SetXY(152,118.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Proteinas en Orina'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Proteinas en Orina'),1,1,'C');
			}

			$pdf->SetXY(152,124.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Proteinas en Orina 24 Hrs'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Proteinas en Orina 24 Hrs'),1,1,'C');
			}
			
			//Encabezado
			$pdf->SetXY(152,130.5);
			$pdf->SetFillColor(0,186,211);
			$pdf->SetFont('Arial','B',12);

			$pdf->Cell(47,6,utf8_decode('PERFIL PRENATAL'),1,1,'C',1);

			//Lista de examenes
			$pdf->SetFont('Arial','',8);
			$pdf->SetXY(152,136.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Hemograma'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Hemograma'),1,1,'C');
			}

			$pdf->SetXY(152,142.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Tipeo Sanguineo'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Tipeo Sanguineo'),1,1,'C');
			}

			$pdf->SetXY(152,148.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Glucosa'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Glucosa'),1,1,'C');
			}

			$pdf->SetXY(152,154.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('V.D.R.L'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('V.D.R.L'),1,1,'C');
			}

			$pdf->SetXY(152,160.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('V.I.H'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('V.I.H'),1,1,'C');
			}

			$pdf->SetXY(152,166.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Toxoplasmosis IgM'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Toxoplasmosis IgM'),1,1,'C');
			}

			$pdf->SetXY(152,172.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Toxoplasmosis IgG'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Toxoplasmosis IgG'),1,1,'C');
			}

			$pdf->SetXY(152,178.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Urocultivo'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Urocultivo'),1,1,'C');
			}

			//Encabezado
			$pdf->SetXY(152,184.5);
			$pdf->SetFillColor(0,186,211);
			$pdf->SetFont('Arial','B',12);

			$pdf->Cell(47,6,utf8_decode('BACTERIOLOGÍA'),1,1,'C',1);

			//Lista de examenes
			$pdf->SetFont('Arial','',8);
			$pdf->SetXY(152,190.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Gram'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Gram'),1,1,'C');
			}

			$pdf->SetXY(152,196.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Frotis Faringeo'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Frotis Faringeo'),1,1,'C');
			}

			$pdf->SetXY(152,202.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Cultivo'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Cultivo'),1,1,'C');
			}

			$pdf->SetXY(152,208.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Hemocultivo'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Hemocultivo'),1,1,'C');
			}

			$pdf->SetXY(152,214.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Urocultivo'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Urocultivo'),1,1,'C');
			}

			$pdf->SetXY(152,220.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Coprocultivo'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Coprocultivo'),1,1,'C');
			}

			$pdf->SetXY(152,226.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Directo de Hongos (OH)'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Directo de Hongos (OH)'),1,1,'C');
			}

			$pdf->SetXY(152,232.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Cultivo de Hongos'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Cultivo de Hongos'),1,1,'C');
			}

			$pdf->SetXY(152,238.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Cultivo Secreción Vaginal'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Cultivo Secreción Vaginal'),1,1,'C');
			}


			//Encabezado
			$pdf->SetXY(152,244.5);
			$pdf->SetFillColor(0,186,211);
			$pdf->SetFont('Arial','B',12);

			$pdf->Cell(47,6,utf8_decode('VARIOS'),1,1,'C',1);

			//Lista de examenes
			$pdf->SetFont('Arial','',8);
			$pdf->SetXY(152,250.5);
			if ($tigre==2) {
				$pdf->SetTextColor(182, 0, 61);
				$pdf->Cell(47,6, utf8_decode('Espermograma'),1,1,'C');
			} else {
				$pdf->Cell(47,6, utf8_decode('Espermograma'),1,1,'C');
			}

			$pdf->SetFont('Arial','',9);
			$pdf->SetXY(10,262.5);
		    $pdf->Cell(47,6, utf8_decode('OTROS EXAMENES:'),0,1,'L');
			


	$pdf->SetFont('Arial','',10);
	
	
	
	
	$pdf->Output();
?>