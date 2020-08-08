<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Barang</h3>
<a class="btn" href="barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_brg=mysqli_real_escape_string($connect, $_GET['id']);


$det=mysqli_query($connect, "select * from barang where id='$id_brg'")or die(mysqli_error());
while($d=mysqli_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>Kode Barang</td>
			<td><?php echo $d['kode'] ?></td>
		</tr>
		<tr>
			<td>Nama Barang</td>
			<td><?php echo $d['nama'] ?></td>
		</tr>
		<tr>
			<td>Jenis Barang</td>
			<td><?php echo $d['jenis'] ?></td>
		</tr>
		<tr>
			<td>Harga Barang</td>
			<td>Rp.<?php echo number_format($d['harga']) ?>,-</td>
		</tr>
		<tr>
			<td>Jumlah Saat Ini</td>
			<td><?php echo $d['jumlah'] ?></td>
		</tr>
		<tr>
		</tr>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>