<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Pelanggan</h3>
<a class="btn" href="data_pelanggan.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_brg=mysqli_real_escape_string($connect, $_GET['id']);


$det=mysqli_query($connect, "select * from pelanggan where id='$id_brg'")or die(mysqli_error());
while($d=mysqli_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>Kode Pelanggan</td>
			<td><?php echo $d['kode'] ?></td>
		</tr>
		<tr>
			<td>Nama Pelanggan</td>
			<td><?php echo $d['nama'] ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><?php echo $d['alamat'] ?></td>
		</tr>
<tr>
			<td>Telepon</td>
			<td><?php echo $d['telepon'] ?></td>
		</tr>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>