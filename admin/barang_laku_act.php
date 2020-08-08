<?php 

include 'config.php';
$kode=$_POST['kode'];
$tgl=$_POST['tgl'];
$nama=$_POST['nama'];
$customer=$_POST['customer'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];

$dt=mysqli_query($connect, "select * from barang where kode='$kode'");
$data=mysqli_fetch_array($dt);
$sisa=$data['jumlah']-$jumlah;
mysqli_query($connect, "update barang set jumlah='$sisa' where kode='$kode'");

$modal=$data['modal'];
$laba=$harga-$modal;
$labaa=$laba*$jumlah;
$total_harga=$harga*$jumlah;
mysqli_query($connect, "insert into barang_laku values('','$kode','$tgl','$nama','$customer','$jumlah','$harga','$total_harga','$labaa')")or die(mysqli_error());
header("location:barang_laku.php");

?>