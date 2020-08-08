<?php 
include 'config.php';
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
$modal=$_POST['modal'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];
$sisa=$_POST['sisa'];

mysqli_query($connect, "insert into barang values('','$kode','$nama','$jenis','$modal','$harga','$jumlah','$sisa')");
header("location:barang.php");

 ?>