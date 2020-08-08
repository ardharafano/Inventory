<?php 
include 'config.php';
$id=$_POST['id'];
$tgl=$_POST['tgl'];
$nama=$_POST['nama'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];

$dt=mysqli_query($connect, "select * from barang where nama='$nama'");
$data=mysqli_fetch_array($dt);
$sisa=$data['jumlah']-$jumlah;
mysqli_query($connect, "update barang set jumlah='$sisa' where nama='$nama'");

$modal=$data['modal'];
$laba=$harga-$modal;
$labaa=$laba*$jumlah;
$total_harga=$harga*$jumlah;

mysqli_query($connect, "update barang_laku set tanggal='$tgl', nama='$nama', harga='$harga', jumlah='$jumlah' where id='$id'")or die(mysqli_error());;
header("location:barang_laku.php");

?>