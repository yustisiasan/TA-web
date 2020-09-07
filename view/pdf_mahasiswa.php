<?php
	require_once("../model/database.php");
	$db_handle = new database();
	$result = $db_handle->runQuery("SELECT * FROM mahasiswa");
	$header = $db_handle->runQuery("SELECT `COLUMN_NAME` 
	FROM `INFORMATION_SCHEMA`.`COLUMNS` 
	WHERE `TABLE_SCHEMA`='u665316764_dbmhs' 
		AND `TABLE_NAME`='mahasiswa'");

	require('../libraries/fpdf/fpdf.php');
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',10);		
	
	foreach($header as $heading) {
		foreach($heading as $column_heading)
			$pdf->Cell(39,10,$column_heading,1);
	}
	
	foreach($result as $row) {
		$pdf->SetFont('Arial','',10);	
		$pdf->Ln();
		foreach($row as $column)
			$pdf->Cell(39,10,$column,1);
	}
	
	$pdf->Output();
?>