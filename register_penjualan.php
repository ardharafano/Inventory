<!DOCTYPE html>
<html>
<head>
	<title>Inventory Barang</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.js"></script>
	<?php include 'admin/config.php'; ?>
	<style type="text/css">
	.kotak{	
		margin-top: 150px;
	}

	.kotak .input-group{
		margin-bottom: 20px;
	}
	</style>
</head>
<body>	
	<div class="container">
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "berhasil"){
				echo "<div style='margin-bottom:-55px' class='alert alert-success' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Registrasi berhasil</div>";
			}
		}
		?>
		<div class="panel panel-default">
			<form action="register_act_penjualan.php" method="post">
				<div class="col-md-4 col-md-offset-4 kotak">
					<h3>Silahkan Register</h3>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input type="text" class="form-control" placeholder="Username" name="uname" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						<input type="password" class="form-control" placeholder="Password" name="pass" required>
					</div>
					<div class="input-group">			
						<input type="submit" class="btn btn-primary" value="Register"> &nbsp
									
					<td colspan="2" align="center">Sudah punya akun? <a href="index_penjualan.php"><b>Login</b></a></td>
					</div>
				</div>
			</form>

		</div>
	</div>
</body>
</html>

<?php
include 'db.php';

if (@$_POST['simpan']) {

  $uname = @$_POST['uname'];
  $pass = @$_POST['pass'];

  mysqli_query($connect, "INSERT INTO admin_penjualan(uname,pass) VALUES ('$uname', '$pass')");

?>

<script type="text/javascript">
  alert("SIMPAN berhasil");
  window.location.href="index_penjualan.php"

</script>

<?php  }
 ?>