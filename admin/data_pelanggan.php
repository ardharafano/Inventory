<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Pelanggan</h3>

<br/>
<br/>


<?php 
$per_hal=10;
$jumlah_record=mysqli_query($connect,"SELECT COUNT(*) from pelanggan");
list($jum) = mysqli_fetch_row($jumlah_record);
echo $jum;
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;;
?>
<div class="table">
	<table class="table">
		<tr>
			<td>Jumlah Record</td>		
			<td><?php echo $jum; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>	
			<td><?php echo $halaman; ?></td>
		</tr>
	</table>
	<a style="margin-bottom:10px" href="lap_pelanggan.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak Data Pelanggan</a><br>
</div>
<form action="cari_pelanggan.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="cari pelanggan di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table">
	<tr>
		<th>No</th>
		<th>Kode Pelanggan</th>
		<th>Nama Pelanggan</th>
		<th>Alamat</th>
		<th>Telepon</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th>Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysqli_real_escape_string($connect,$_GET['cari']);
		$brg=mysqli_query($connect, "select * from pelanggan where kode like '$cari' or nama like '$cari'");
	}else{
		$brg=mysqli_query($connect, "select * from pelanggan limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['kode'] ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td><?php echo $b['alamat'] ?></td>
			<td><?php echo $b['telepon'] ?></td>
			<td>
				<a href="det_pelanggan.php?id=<?php echo $b['id']; ?>" class="btn btn-info">Detail</a>


			</td>
		</tr>		
		<?php 
	}
	?>
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
				<h4 class="modal-title">Tambah Pelanggan Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tambah_pelanggan.php" method="post">
					<div class="form-group">
						<label>Kode Pelanggan</label>
						<input name="kode" input type="text" id="kode" class="form-control" placeholder="Kode Pelanggan .." required>
					</div>
					<div class="form-group">
						<label>Nama Pelanggan</label>
						<input name="nama" input type="text" id="nama" class="form-control" placeholder="Nama Pelanggan .." required>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input name="alamat" input type="text" id="alamat" class="form-control" placeholder="Alamat Pelanggan.." required>
					</div>	
					<div class="form-group">
						<label>Telepon</label>
						<input name="telepon" input type="text" id="telepon" class="form-control" placeholder="Telepon Pelanggan .." required>
					</div>						
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


<?php 
include 'footer.php';

?>