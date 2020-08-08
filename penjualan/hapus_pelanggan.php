<?php 
include 'config.php';
$id=$_GET['id'];
mysqli_query($connect,"delete from pelanggan where id='$id'");
header("location:data_pelanggan.php");

?>