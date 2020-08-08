<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Penjualan Barang</h3>
<a class="btn" href="barang_laku.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_brg=mysqli_real_escape_string($connect, $_GET['id']);


$det=mysqli_query($connect, "select * from barang_laku where id='$id_brg'")or die(mysqli_error());
while($d=mysqli_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>Kode Penjualan</td>
			<td><?php echo $d['kode'] ?></td>
		</tr>
		<tr>
			<td>Tanggal Penjualan</td>
			<td><?php echo $d['tanggal'] ?></td>
		</tr>
		<tr>
			<td>Kode Barang</td>
			<td><?php echo $d['nama'] ?></td>
		</tr>
			<tr>
			<td>Pelanggan</td>
			<td><?php echo $d['customer'] ?></td>
		</tr>
			<tr>
			<td>Jumlah</td>
			<td><?php echo $d['jumlah'] ?></td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>Rp.<?php echo number_format($d['harga']); ?>,-</td>
		</tr>
		<tr>
			<td>Total Harga</td>
			<td>Rp.<?php echo number_format($d['total_harga']) ?>,-</td>
		</tr>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>