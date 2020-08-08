<?php
include 'config.php';
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',13);
$pdf->Image('https://siva.jsstatic.com/id/4793/images/logo/4793_logo_0.jpg',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'PT GOLD COIN',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Jl. Sultan Agung No.31, Medan Satria, Kota Bekasi, Jawa Barat 17132',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Website : http://www.goldcoin-group.com/',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Pelanggan",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Kode Pelanggan', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'Nama Pelanggan', 1, 0, 'C');
$pdf->Cell(10, 0.8, 'Alamat', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Telepon', 1, 1,'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysqli_query($connect,"select * from pelanggan");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['kode'],1, 0, 'C');
	$pdf->Cell(7, 0.8, $lihat['nama'],1, 0, 'C');
	$pdf->Cell(10, 0.8, $lihat['alamat'], 1, 0,'C');
	$pdf->Cell(4.5, 0.8, $lihat['telepon'], 1, 1,'C');

	$no++;
}


$pdf->Output("laporan_buku.pdf","I");

?>

