<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Pelanggan</h3>
<a class="btn" href="data_pelanggan.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_brg=mysqli_real_escape_string($connect, $_GET['id']);
$det=mysqli_query($connect, "select * from pelanggan where id='$id_brg'")or die(mysqli_error());
while($d=mysqli_fetch_array($det)){
?>					
	<form action="update_pelanggan.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
			</tr>
			<tr>
				<td>Kode Pelanggan</td>
				<td><input type="text" class="form-control" name="kode" value="<?php echo $d['kode'] ?>"required></td>
			</tr>
			<tr>
				<td>Nama Pelanggan</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>"required></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" class="form-control" name="alamat" value="<?php echo $d['alamat'] ?>"required></td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td><input type="text" class="form-control" name="telepon" value="<?php echo $d['telepon'] ?>"required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
<?php include 'footer.php'; ?>