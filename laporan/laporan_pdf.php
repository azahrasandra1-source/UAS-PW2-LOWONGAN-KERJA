<?php
require('../fpdf/fpdf.php');
require_once "../model/Lowongan.php";

$lowongan = new Lowongan();
$data = $lowongan->tampil();

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10,'LAPORAN DATA LOWONGAN PEKERJAAN',0,1,'C');
$pdf->Ln(5);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,10,'No',1);
$pdf->Cell(50,10,'Perusahaan',1);
$pdf->Cell(40,10,'Posisi',1);
$pdf->Cell(30,10,'Lokasi',1);
$pdf->Cell(30,10,'Gaji',1);
$pdf->Ln();

$pdf->SetFont('Arial','',10);
$no = 1;
while($row = $data->fetch_assoc()){
    $pdf->Cell(10,10,$no++,1);
    $pdf->Cell(50,10,$row['nama_perusahaan'],1);
    $pdf->Cell(40,10,$row['posisi'],1);
    $pdf->Cell(30,10,$row['lokasi'],1);
    $pdf->Cell(30,10,$row['gaji'],1);
    $pdf->Ln();
}
$pdf->Output();
?>