<?php
require 'fpdf/fpdf.php';

$pdf=new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',15);

$pdf->Cell(190,10,'Holaaaaa',1,1,'C');
$y=$pdf->GetY();
$pdf->SetY($y+10);

$pdf->SetX(60);
$pdf->Cell(90,10,'Holaaaaa',1,1,'C');

$pdf->MultiCell(100,5,'Holaaaaa',1,'C',0);

$pdf->Output();


?>