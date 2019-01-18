<?php
	include 'plantilla3.php';
	include '../Conexion/conexion.php';

	$sacar1 = mysqli_query($conexion, "SELECT * FROM t_insumo");
     date_default_timezone_set('America/El_Salvador');
    $fecha_actual=date("d/m/Y");                              

	
    $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('L','Letter');

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(45,6,utf8_decode('Lista de insumos'),0,0,'C');
	$pdf->SetX(200);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(65,5, utf8_decode($dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y'). '.'),0,1,'L');
	//hora
	$pdf->SetX(210);
	$pdf->Cell(65,5, utf8_decode( " hora : ".date("h:i:s").'.'),0,1,'L');

	$pdf->Ln(5);

	$pdf->SetFillColor(0,186,211);
	$pdf->SetFont('Arial','B',12);

	

	$pdf->Cell(25,6,utf8_decode('CÓDIGO'),1,0,'C',1);
	$pdf->Cell(30,6,utf8_decode('NOMBRE'),1,0,'C',1);
	$pdf->Cell(30,6,utf8_decode('MARCA'),1,0,'C',1);
	$pdf->Cell(125,6,utf8_decode('DESCRIPCIÓN'),1,0,'C',1);
	$pdf->Cell(45,6,utf8_decode('PRESENTACIÓN'),1,1,'C',1);

	$pdf->SetFont('Arial','',10);
	while ($fila = mysqli_fetch_array($sacar1)) {
                 $id=$fila['ins_codigo'];
                 $nom=$fila['codigo'];  
                 $apellido=$fila['ins_cnombre_comercial'];
                 $marca=$fila['ins_cmarca'];
                 $descrip=$fila['ins_cdescripcion'];
                 $presen=$fila['presentacion'];
             
                 $pdf->Cell(25,6, utf8_decode($fila['codigo']),1,0,'C');
                 $pdf->Cell(30,6, utf8_decode($fila['ins_cnombre_comercial']),1,0,'C');   
                 $pdf->Cell(30,6, utf8_decode($fila['ins_cmarca']),1,0,'C'); 
                 $pdf->Cell(125,6, utf8_decode($fila['ins_cdescripcion']),1,0,'L');  
                 $pdf->Cell(45,6, utf8_decode($fila['presentacion']),1,1,'L'); 

	}
	
	
	$pdf->SetFont('Arial','',10);
	
	
	
	
	$pdf->Output();
?>