<?php
	include 'plantilla2.php';
	include '../Conexion/conexion.php';

	$modificar=$_GET['ir'];

	


$compraa= mysqli_query($conexion,"SELECT
t_compra.id_compra,	
t_compra.factura,
t_compra.fecha_actual,
t_insumo.ins_cnombre_comercial,
t_insumo.ins_cmarca,
t_compra.cantidad,
t_compra.precio_unitario,
t_compra.cantidad * t_compra.precio_unitario as total
FROM
t_compra
INNER JOIN t_insumo ON t_compra.fk_insumo = t_insumo.ins_codigo
WHERE t_compra.id_compra='$modificar' ");
            while ($fila = mysqli_fetch_array($compraa)) {

            	 $numFac=$fila['factura']; 
            	 $fecCompra=$fila['fecha_actual']; 
            	 $insumito=$fila['ins_cnombre_comercial'];
            	 $marca=$fila['ins_cmarca'];
            	 $cant=$fila['cantidad'];
            	 $precio=$fila['precio_unitario'];

            	 

                   
}
             


$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	date_default_timezone_set('America/El_Salvador');
     $fecha_actuall=date("d/m/Y");  
 
$pdf->Ln(5);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(100,5, utf8_decode('FACTURAS REGISTRADAS'),0,0,'L');		
   
			$pdf->SetX(140);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(135,5, utf8_decode($dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y').'.'),0,1,'L');

$pdf->Ln(10);
	$pdf->SetFillColor(0,186,211);
	$pdf->SetFont('Arial','B',10);

	$pdf->Cell(30,6,utf8_decode('Nº DE FACTURA'),1,0,'C',1);
	$pdf->Cell(40,6,utf8_decode('FECHA DE COMPRA'),1,0,'C',1);
	$pdf->Cell(25,6,utf8_decode('INSUMO'),1,0,'C',1);
	$pdf->Cell(25,6,utf8_decode('MARCA'),1,0,'C',1);
	$pdf->Cell(25,6,utf8_decode('CANTIDAD'),1,0,'C',1);
	$pdf->Cell(25,6,utf8_decode('PRECIO'),1,0,'C',1);
	$pdf->Cell(25,6,utf8_decode('TOTAL'),1,1,'C',1);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(30,6,utf8_decode('#'.$numFac),1,0,'C');
	$pdf->Cell(40,6,utf8_decode($fecCompra),1,0,'C');
	$pdf->Cell(25,6,utf8_decode($insumito),1,0,'C');
	$pdf->Cell(25,6,utf8_decode($marca),1,0,'C');
	$pdf->Cell(25,6,utf8_decode($cant),1,0,'C');
	$pdf->Cell(25,6,utf8_decode($precio),1,0,'C');
	//$pdf->Cell(25,6,utf8_decode(total),1,1,'C');

	
	
	
	
	

	$pdf->SetFont('Arial','',10);
	
	
	
	
	$pdf->Output();
?>