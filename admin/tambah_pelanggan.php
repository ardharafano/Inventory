<?php 
include 'config.php';
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$telepon=$_POST['telepon'];

mysqli_query($connect, "insert into pelanggan values('','$kode','$nama','$alamat','$telepon')");
header("location:data_pelanggan.php");

 ?>