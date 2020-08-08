<?php 
include 'admin/config.php';
$uname=$_POST['uname'];
$pass=$_POST['pass'];

mysqli_query($connect, "insert into admin_penjualan values('','$uname','$pass')");
header("location:user_penjualan.php");

 ?>
