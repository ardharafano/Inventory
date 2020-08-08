<!DOCTYPE html>
<html>
<head>
	<title>Inventory Barang</title>
	<link rel="shortcut icon" href="https://siva.jsstatic.com/id/4793/images/logo/4793_logo_0.jpg">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.js"></script>
	<?php include 'admin/config.php'; ?>
	<style type="text/css">
	.kotak{	
		margin-top: 75px;
	}

	.kotak .input-group{
		margin-bottom: 20px;
	}
	</style>
</head>
<body><br>	
<center><img src='https://siva.jsstatic.com/id/4793/images/logo/4793_logo_0.jpg' />
<h2>Aplikasi Inventory PT Gold Coin</h2>
<h3>Bagian Gudang</h3></center>
	<div class="container">
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
				echo "<div style='margin-bottom:-55px' class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Login Gagal Username dan Password Salah</div>";
			}
		}
		?>
		<div class="panel panel-default">
			<form action="login_act.php" method="post">
				<div class="col-md-4 col-md-offset-4 kotak">
					<h3>Silahkan Login</h3>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input type="text" class="form-control" placeholder="Username" name="uname" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						<input type="password" class="form-control" placeholder="Password" name="pass" required>
					</div>
					<div class="input-group">			
						<input type="submit" class="btn btn-primary" value="Login"> &nbsp
									
					<td colspan="2" align="center">Belum punya akun? <a href="register.php"><b>Register</b></a></td><br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td colspan="2" align="center">Masuk ke Bagian Penjualan <a href="index_penjualan.php"><b>Disini</b></a></td>
					</div>
				</div>
			</form>

		</div>
	</div>
</body>
</html>