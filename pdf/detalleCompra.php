<?php
	include 'plantilla2.php';
	include '../Conexion/conexion.php';

	 $sacar1 = mysqli_query($conexion, "SELECT DISTINCT factura, fecha_actual FROM t_compra");
             


$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	date_default_timezone_set('America/El_Salvador');
     $fecha_actuall=date("d/m/Y");  
 
$pdf->Ln(10);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(100,5, utf8_decode('FACTURAS REGISTRADAS'),0,0,'L');		
   
			$pdf->SetX(140);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(135,5, utf8_decode($dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y').'.'),0,1,'L');
$pdf->Ln(5);
$pdf->SetX(60);
	$pdf->SetFillColor(0,186,211);
	$pdf->SetFont('Arial','B',12);

	$pdf->Cell(45,6,utf8_decode('Nº DE FACTURA'),1,0,'C',1);
	$pdf->Cell(50,6,utf8_decode('FECHA DE COMPRA'),1,1,'C',1);

	 while ($fila = mysqli_fetch_array($sacar1)) {
                
                $factura=$fila['factura'];  
                $fechCompra=$fila['fecha_actual']=date("d-m-Y");


               $pdf->SetX(60);
                $pdf->SetFont('Arial','',12);
                $pdf->Cell(45,6, utf8_decode('#'.$fila['factura']),1,0,'C');
                 $pdf->Cell(50,6, utf8_decode($fila['fecha_actual']),1,1,'C'); 


            }
	
	
	
	

	$pdf->SetFont('Arial','',10);
	
	
	
	
	$pdf->Output();
?>