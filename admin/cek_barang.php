<?php
include "config.php";
$barang = mysqli_fetch_array(mysqli_query($connect, "select * from barang where kode='$_GET[kode]'"));
$barang = array('nama'   	=>  $barang['nama'],
				'jenis'   	=>  $barang['jenis'],
				'harga'   	=>  $barang['harga'],
              	'jumlah'  	=>  $barang['jumlah'],);
 echo json_encode($barang);