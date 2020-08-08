<?php
include "config.php";
$barang = mysqli_fetch_array(mysqli_query($connect, "select * from barang where kode='$_GET[kode]'"));
$barang = array('harga'   	=>  $barang['harga'],);
 echo json_encode($barang);