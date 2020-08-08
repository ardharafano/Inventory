<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Barang</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Barang</button>
<br/>
<br/>

<?php 
$periksa=mysqli_query($connect, "select * from barang where jumlah <=3");
while($q=mysqli_fetch_array($periksa)){	
	if($q['jumlah']<=3){	
		?>	
		<script>
			$(document).ready(function(){
				$('#pesan_sedia').css("color","red");
				$('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
			});
		</script>
		<?php
		echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['nama']."</a> yang tersisa sudah kurang dari 3 . silahkan pesan lagi !!</div>";	
	}
}
?>
<?php 
$per_hal=20;
$jumlah_record=mysqli_query($connect,"SELECT COUNT(*) from barang");
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
	<a style="margin-bottom:10px" href="lap_barang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak Data Barang</a><br>
</div>
<form action="cari_act.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari barang di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table">
	<tr>
		<th>No</th>
		<th>Kode Barang</th>
		<th>Nama Barang</th>
		<th>Harga Jual</th>
		<th>Jumlah</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th>Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysqli_real_escape_string($connect,$_GET['cari']);
		$brg=mysqli_query($connect, "select * from barang where kode like '$cari' or jenis like '$cari'");
	}else{
		$brg=mysqli_query($connect, "select * from barang limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['kode'] ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td>Rp.<?php echo number_format($b['harga']) ?>,-</td>
			<td><?php echo $b['jumlah'] ?></td>
			<td>
				<a href="det_barang.php?id=<?php echo $b['id']; ?>" class="btn btn-info">Detail</a>
				<a href="edit.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus.php?id=<?php echo $b['id']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
	<tr>
		<td colspan="4">Total Harga</td>
		<td>			
		<?php 
		
			$x=mysqli_query($connect, "select sum(harga) as total from barang");	
			$xx=mysqli_fetch_array($x);			
			echo "<b> Rp.". number_format($xx['total']).",-</b>";		
		?>
		</td>
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
				<h4 class="modal-title">Tambah Barang Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_brg_act.php" method="post">
					<div class="form-group">
						<label>Kode Barang</label><select class="form-control" name="kode" onchange="cek_database()" id="kode">
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
						<label>Nama Barang</label>
						<input name="nama" input type="text" id="nama" class="form-control" placeholder="Nama Barang .." required>
					</div>
					<div class="form-group">
						<label>Jenis Barang</label>
						<input name="jenis" input type="text" id="jenis" class="form-control" placeholder="Jenis Barang .." required>
					</div>							
					<div class="form-group">
						<label>Harga Jual</label>
						<input name="harga" type="text" id="harga" class="form-control" placeholder="Harga Jual per unit" required>
					</div>	
					<div class="form-group">
						<label>Jumlah</label>
						<input name="jumlah" type="text" class="form-control" placeholder="Jumlah" required>
					</div>																	

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
<script type="text/javascript">
    function cek_database(){
        var kode = $("#kode").val();
        $.ajax({
            url: 'cek_barang.php',
            data:"kode="+kode ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#nama').val(obj.nama);
            $('#jenis').val(obj.jenis);
			$('#harga').val(obj.harga);
			$('#jumlah').val(obj.jumlah);

        });
    }
</script>


<?php 
include 'footer.php';

?>