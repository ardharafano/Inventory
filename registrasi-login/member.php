<?PHP require_once"koneksi.php"; 
if(empty($_SESSION['member_id'])) { 
header ('location:./');
} else{ 
$query = "SELECT * FROM member WHERE member_id='$_SESSION[member_id]'"; $no=0;
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
$rows= $result->fetch_assoc();
extract($rows);
echo'
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tutorial membuat form Registrasi dan Login</title>
<link rel="stylesheet" href="assets/bootstrap.min.css">
<script type="text/javascript" src="assets/jquery.js"></script>
<script type="text/javascript" src="assets/bootstrap.min.js"></script>
<style>
body { background:#eeeeee;}
</style>
</head>

<body>';
require_once"./assets/menu-nav.php";

echo'
<div class="container"><div class="row">
<h3>Selamat Datang '.$member_nama.'</h3>
<hr>
<div class="panel panel-default">
<div class="panel-heading">Daftar Member</div>
<div class="panel-body">

<table class="table no-margn">
<thead>
<tr>
<th>Nomor</th>
<th>Nama</th>
<th>Username</th>
<th>Email</th>
<th>Tanggal Daftar</th>
<th>Status</th>
</tr>
</thead>
<tbody>';
if($result->num_rows > 0){$no++;
	echo'
<tr>
<td>'.$no.'</td>
<td>'.$member_nama.'</td>
<td>'.$member_username.'</td>
<td>'.$member_email.'</td>
<td>'.$member_tgl_daftar.'</td>
<td>'.$member_status.'</td>
</tr>';}
echo'
</tbody>
</table>
</div>
</div>

</div></div>

</body>
</html>';}
