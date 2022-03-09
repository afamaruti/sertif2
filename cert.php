<?php
require("fpdf17/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage('L','A4');
$pdf->Image('assets/4.png', 0, 0, $pdf->w, $pdf->h);
$pdf->AddFont('manda','','Manda Script.php');
$pdf->SetFont('manda','',65);
$pdf->SetXY(93,90);

include 'koneksi.php';

if(isset($_GET['npk'])){
    $npk    =$_GET['npk'];
}

$data = mysqli_query($conn, "select * from sertif where npk='$npk'");
// while ($row = mysqli_fetch_array($data)){
$row = mysqli_fetch_array($data);
    // $pdf->Cell(120,10,'Nama Anak',0,0,'C');
$pdf->Cell(120,10,$row['nama'],0,0,'C');

$pdf->SetXY(93,138);
$pdf->AddFont('futura','','futura.php');
$pdf->SetFont('futura','',40);
// $pdf->Cell(120,10,'Nama Orang Tua',0,0,'C');
$pdf->Cell(120,10,$row['sekolah'],0,0,'C');
//}
$pdf->Output();
?>