<?php

include 'config.php';
if(isset($_GET['tgl1'])) {
  $tgl1=$_GET['tgl1'];
  $tgl2=$_GET['tgl2'];
  $sql = "SELECT * FROM barang_laku WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'";
} else {
  $sql = "SELECT * FROM barang_laku";
}
$query=mysqli_query($connect, $sql);
if(!mysqli_num_rows($query)) {
  echo "Data Gak Ada.... ngapain dijadiin pe-de-ef";
  exit;
}
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
$pdf->Cell(0,0.7,'Laporan Data Penjualan Barang',0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->Cell(6,0.7,"Dari : ".$_GET['tgl1'] ." Sampai ".$_GET['tgl2'],0,0,'C');
$pdf->ln(1);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'Kode Penjualan', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Kode Barang', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Kode Pelanggan', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Jumlah', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'harga', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Total harga', 1, 1, 'C');

$no=1;
$pendapatan = 0;
$laba = 0;
while($lihat=mysqli_fetch_array($query)){
  $pendapatan += $lihat['total_harga'];
  $laba += $lihat['laba'];
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(7, 0.8, $lihat['kode'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['tanggal'],1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['nama'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['customer'], 1, 0,'C');
	$pdf->Cell(2, 0.8, $lihat['jumlah'], 1, 0,'C');
	$pdf->Cell(3, 0.8, "Rp. ".number_format($lihat['harga'])." ,-", 1, 0,'C');
	$pdf->Cell(3, 0.8, "Rp. ".number_format($lihat['total_harga'])." ,-",1, 1, 'C');
	
	$no++;
}
mysqli_free_result($query);
$pdf->Cell(23, 0.8, "Total Pendapatan", 1, 0,'C');
$pdf->Cell(3, 0.8, "Rp. ".number_format($pendapatan)." ,-", 1, 0,'C');	



$pdf->Output("laporan_buku.pdf","I");
?>
