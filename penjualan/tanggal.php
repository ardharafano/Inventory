<body>
<title>Inventory Barang</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	 	<script>
	  		$( function() {
	    		$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
	    		$( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' });
	  		} );
	  	</script>
  <center>
  <form action="" method="post">
  <center><p>Dari: <input type="text" id="datepicker" name="tgl1">
  Sampai: <input type="text" id="datepicker2" name="tgl2"> 
  <input type="submit" value="cari" name="cari"></p></center>
  </form>
  <table border="5" width="1000">
    <tr>
	<td>Kode Penjualan</td>
	<td>Tanggal Penjualan</td>
    <td>Nama Barang</td>
	<td>Customer</td>
    <td>Jumlah</td>
	<td>Harga</td>
	<td>Total Harga</td>
	<td>Keuntungan</td>
    </tr>
<?php 
  include "config.php";
  $href = "lap_penjualan_tgl.php";
  if(isset($_POST['cari'])) {
    $tgl1=$_POST['tgl1'];
    $tgl2=$_POST['tgl2'];
	$href .= "?tgl1=".$tgl1."&tgl2=".$tgl2;
    $query = "SELECT * FROM barang_laku WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'";
  } else {
    $query = "SELECT * FROM barang_laku";
  }
  $result = mysqli_query($connect, $query);
  $pendapatan = 0;
  $laba = 0;
  if(!mysqli_num_rows($result)) {
    echo "<tr><td colspan='7'>Data Tidak ada untuk tanggal ini.</td></tr>";
  } else {
    while($row = mysqli_fetch_array($result)) {
      $pendapatan += $row['total_harga'];
      $laba += $row['laba'];
      echo "<tr>
      <td>".$row['kode']."</td>
      <td>".$row['tanggal']."</td>
      <td>".$row['nama']."</td>
      <td>".$row['customer']."</td>
      <td>".$row['jumlah']."</td>
      <td>Rp. ".$row['harga']."</td>
	  <td>Rp. ".$row['total_harga']."</td>
      <td>Rp. ".$row['laba']."</td>
      </tr>";
    }
    mysqli_free_result($result);
  }
?>
</table> 
<br>
Total Pendapatan: Rp. <?php echo number_format($pendapatan); ?>,-<br>
Total Keuntungan: Rp. <?php echo number_format($laba); ?>,-<br>
</center>
<br>
<a class="btn" href="tanggal.php"><span class="glyphicon glyphicon-arrow-left"></span>Kembali</a> | | 
<a href="<?php echo $href; ?>" target="_blank" class="btn btn-default pull-right">Cetak Laporan</a>
<br>
</body>
</html>