 <?php 
include 'config.php';
$id=$_POST['id'];
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
$modal=$_POST['modal'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];

mysqli_query($connect, "update barang set kode='$kode', nama='$nama', jenis='$jenis', modal='$modal', harga='$harga', jumlah='$jumlah' where id='$id'");
header("location:barang.php");

?>