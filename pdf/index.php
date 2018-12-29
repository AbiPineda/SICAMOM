<?php
	include 'plantilla.php';
	
	
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('P','A5');
	
	//$pdf->SetFillColor(232,232,232);
	//$pdf->SetFont('Arial','B',12);
	//$pdf->Cell(70,6,'ESTADO',1,0,'C',1);
	//$pdf->Cell(20,6,'ID',1,0,'C',1);
	//$pdf->Cell(70,6,'MUNICIPIO',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	
	$pdf->Output();
?>