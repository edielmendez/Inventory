<?php
require('../methods/fpdf.php');



$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->Cell(40,10,"REPORTE DE INCIDENCIA");
$pdf->Line(15, 30, 200, 30);
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,"Nombre del usuario : ");
$pdf->Ln();
$pdf->SetFont('Times');
$pdf->Cell(40,10,$_POST['nombre']);

$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,"Telefono : ");
$pdf->Ln();
$pdf->SetFont('Times');
$pdf->Cell(40,10,$_POST['telefono']);
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,"Email : ");
$pdf->Ln();
$pdf->SetFont('Times');
$pdf->Cell(40,10,$_POST['email']);
$pdf->Ln();
$pdf->Ln();


$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,"Tipo de usuario : ");
$pdf->Ln();
$pdf->SetFont('Times');
$pdf->Cell(40,10,$_POST['tipoUsuario']);
$pdf->Ln();
$pdf->Ln();


$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,"Tipo de incidencia : ");
$pdf->Ln();
$pdf->SetFont('Times');
$pdf->Cell(40,10,$_POST['tipoIncidencia']);
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,"Descripcion de la incidencia : ");
$pdf->Ln();
$pdf->SetFont('Times');
$pdf->Cell(40,10,$_POST['descripcion']);
$pdf->Ln();
$pdf->Ln();


$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,"Solucion de la incidencia : ");
$pdf->Ln();
$pdf->SetFont('Times');
$pdf->Cell(40,10,$_POST['solucion']);
$pdf->Ln();
$pdf->Ln();

$pdf->Output();
?>
