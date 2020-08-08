<?php include 'header.php';	?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Barang Terjual</h3>

<form action="" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
		<select type="submit" name="tanggal" class="form-control" onchange="this.form.submit()">
			<option>Pilih tanggal ..</option>
			<?php 
			$pil=mysqli_query($connect, "select distinct tanggal from barang_laku order by tanggal desc");
			while($p=mysqli_fetch_array($pil)){
				?>
				<option><?php echo $p['tanggal'] ?></option>
				<?php
			}
			?>			
		</select>
	</div>

</form>
<br/>
<?php 
$per_hal=20;
$jumlah_record=mysqli_query($connect,"SELECT COUNT(*) from barang_laku");
list($jum) = mysqli_fetch_row($jumlah_record);
echo $jum;
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;;
?>
<div class="table">
	<table class="table">
		<tr>
			<td>Total Barang</td>		
			<td><?php echo $jum; ?></td>
		</tr>
		<tr>
			<td>Total Halaman</td>	
			<td><?php echo $halaman; ?></td>
		</tr>
	</table>
		<a style="margin-bottom:10px" href="tanggal.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak Laporan Berdasarkan Tanggal</a>	
	<a style="margin-bottom:10px" href="lap_barang_laku.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak Laporan Penjualan Barang</a>
	</div>

<br/>
<?php 
if(isset($connect, $_GET['tanggal'])){
	echo "<h4> Data Penjualan Tanggal  <a style='color:blue'> ". $_GET['tanggal']."</a></h4>";
}
?>
<table class="table">
	<tr>
		<th>No</th>
		<th>Kode Penjualan</th>
		<th>Tanggal</th>
		<th>Pelanggan</th>
		<th>Kode Barang</th>
		<th>Harga Terjual</th>
		<th>Jumlah</th>				
		<th>Opsi</th>
	</tr>
	<?php 
	if(isset($connect,$_GET['tanggal'])){
		$tanggal=mysqli_real_escape_string($connect, $_GET['tanggal']);
		$brg=mysqli_query($connect, "select * from barang_laku where tanggal like '$tanggal' order by tanggal desc");
	}else{
		$brg=mysqli_query($connect, "select * from barang_laku order by tanggal desc");
		$brg=mysqli_query($connect, "select * from barang_laku limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['kode'] ?></td>
			<td><?php echo $b['tanggal'] ?></td>
			<td><?php echo $b['customer'] ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td>Rp.<?php echo number_format($b['harga']) ?>,-</td>
			<td><?php echo $b['jumlah'] ?></td>					
			<td>		
				<a href="det_laku.php?id=<?php echo $b['id']; ?>" class="btn btn-info">Detail</a>

			</td>
		</tr>

		<?php 
	}
	?>
	<tr>
		<td colspan="7">Total Pendapatan</td>
		<?php 

			$x=mysqli_query($connect,"select sum(total_harga) as total from barang_laku");	
			$xx=mysqli_fetch_array($x);			
			echo "<td><b> Rp.". number_format($xx['total']).",-</b></td>";


		?>
	</tr>
</table>
<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul>

<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Penjualan
				</div>
				<div class="modal-body">				
					<form action="barang_laku_act.php" method="post">
						<div class="form-group">
							<label>Kode Penjualan</label>
							<input name="kode" type="text" class="form-control" placeholder="Kode Penjualan" autocomplete="off" required>
						</div>			
						<div class="form-group">
							<label>Tanggal</label>
							<input name="tgl" type="text" class="form-control" id="tgl" autocomplete="off" required>
						</div>	
						<div class="form-group">
							<label>Kode Barang</label><select class="form-control" name="nama" onchange="cek_database()" id="kode">
													<option value='' selected>- Pilih -</option>
													<?php
													include "config.php";
													$barang = mysqli_query($connect,"SELECT * FROM barang");
													while ($row = mysqli_fetch_array($barang)) {
													echo "<option value='$row[kode]'>$row[kode]</option>";
													}
													?></select>

						</div>		
						<div class="form-group">
							<label>Pelanggan</label><select class="form-control" name="customer" onchange="cek_database()" id="customer">
													<option value='' selected>- Pilih -</option>
													<?php
													include "config.php";
													$pelanggan = mysqli_query($connect,"SELECT * FROM pelanggan");
													while ($row = mysqli_fetch_array($pelanggan)) {
													echo "<option value='$row[kode]'>$row[kode]</option>";
													}
													?></select>
						</div>							
						<div class="form-group">
							<label>Harga Jual / unit</label>
							<input name="harga" input type="text" id="harga" class="form-control" placeholder="Harga Barang .." required>

						</div>
						
						<div class="form-group">
							<label>Jumlah</label>
							<input name="jumlah" type="text" class="form-control" placeholder="Jumlah" autocomplete="off" required>
						</div>																	

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<input type="reset" class="btn btn-danger" value="Reset">												
						<input type="submit" class="btn btn-primary" value="Simpan">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tgl").datepicker({dateFormat : 'yy/mm/dd'});							
		});
	</script>
	<script type="text/javascript">
    function cek_database(){
        var kode = $("#kode").val();
        $.ajax({
            url: 'cek_barang_terjual.php',
            data:"kode="+kode ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#harga').val(obj.harga);

        });
    }
</script>

<?php
//koneksi ke database
$conn = new mysqli("localhost", "root", "", "malasngoding_kios");
if ($conn->connect_errno) {
    echo die("Failed to connect to MySQL: " . $conn->connect_error);
}
 
$rows = array();
$table = array();
$table['cols'] = array(
	//membuat label untuk nama nya, tipe string
	array('label' => 'Nama Barang', 'type' => 'string'),
	//membuat label untuk jumlah siswa, tipe harus number untuk kalkulasi persentasenya
	array('label' => 'Jumlah Terjual', 'type' => 'number')
);
 
//melakukan query ke database select
$sql = $conn->query("SELECT * FROM barang_laku");
//perulangan untuk menampilkan data dari database
while($data = $sql->fetch_assoc()){
	//membuat array
	$temp = array();
	//memasukkan data pertama yaitu nama kelasnya
	$temp[] = array('v' => (string)$data['nama']);
	//memasukkan data kedua yaitu jumlah siswanya
	$temp[] = array('v' => (int)$data['jumlah']);
	//memasukkan data diatas ke dalam array $rows
	$rows[] = array('c' => $temp);
}
 
//memasukkan array $rows dalam variabel $table
$table['rows'] = $rows;
//mengeluarkan data dengan json_encode. silahkan di echo kalau ingin menampilkan data nya
$jsonTable = json_encode($table);
 
?>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
 
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);
 
	function drawChart() {
 
		// membuat data chart dari json yang sudah ada di atas
		var data = new google.visualization.DataTable(<?php echo $jsonTable; ?>);
 
		// Set options, bisa anda rubah
		var options = {'title':'Data Barang Terjual',
					   'width':1000,
					   'height':500};
 
		var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
		chart.draw(data, options);
	}
    </script>
</head>
<body>
    
	<!--Div yang akan menampilkan chart-->
    <div id="chart_div"></div>
	
</body>
</html>
	<?php include 'footer.php'; ?>