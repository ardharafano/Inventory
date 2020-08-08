<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Barang</h3>
<a class="btn" href="barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_brg=mysqli_real_escape_string($connect, $_GET['id']);
$det=mysqli_query($connect, "select * from barang where id='$id_brg'")or die(mysqli_error());
while($d=mysqli_fetch_array($det)){
?>					
	<form action="update.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
			</tr>
			<tr>
				<td>Kode Barang</td>
				<td><input type="text" class="form-control" name="kode" value="<?php echo $d['kode'] ?>"required></td>
			</tr>
			<tr>
				<td>Nama Barang</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>"required></td>
			</tr>
			<tr>
				<td>Jenis Barang</td>
				<td><input type="text" class="form-control" name="jenis" value="<?php echo $d['jenis'] ?>"required></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input type="text" class="form-control" name="harga" value="<?php echo $d['harga'] ?>"required></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input type="text" class="form-control" name="jumlah" value="<?php echo $d['jumlah'] ?>"required></td>
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