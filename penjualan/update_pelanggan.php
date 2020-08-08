 <?php 
include 'config.php';
$id=$_POST['id'];
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$telepon=$_POST['telepon'];

mysqli_query($connect, "update pelanggan set kode='$kode', nama='$nama', alamat='$alamat', telepon='$telepon' where id='$id'");
header("location:data_pelanggan.php");

?>