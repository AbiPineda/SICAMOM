<?php
	include 'plantilla2.php';
	include '../Conexion/conexion.php';

	$sacar1 = mysqli_query($conexion, "SELECT * FROM t_insumo");
     
    $fecha_actual=date("d/m/Y");                              

	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(45,6,utf8_decode('Lista de insumos'),0,0,'C');
	$pdf->Cell(220,5, utf8_decode($fecha_actual),0,1,'C');

	$pdf->Ln(5);

	$pdf->SetFillColor(0,186,211);
	$pdf->SetFont('Arial','B',12);

	

	$pdf->Cell(25,6,utf8_decode('CÓDIGO'),1,0,'C',1);
	$pdf->Cell(30,6,utf8_decode('NOMBRE'),1,0,'C',1);
	$pdf->Cell(30,6,utf8_decode('MARCA'),1,0,'C',1);
	$pdf->Cell(45,6,utf8_decode('DESCRIPCIÓN'),1,0,'C',1);
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
                 $pdf->Cell(45,6, utf8_decode($fila['ins_cdescripcion']),1,0,'C');  
                 $pdf->Cell(45,6, utf8_decode($fila['presentacion']),1,1,'C'); 

	}
	
	
	$pdf->SetFont('Arial','',10);
	
	
	
	
	$pdf->Output();
?>