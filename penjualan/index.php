<?php 
include 'header.php';
?>

<?php
$a = mysqli_query($connect, "select * from barang_laku");
?>

<div class="col-md-10">
	<center><img src='https://siva.jsstatic.com/id/4793/images/logo/4793_logo_0.jpg' />
	<h3>Selamat Datang di</h3>	
    <h3>Aplikasi Inventory PT Gold Coin</h3></center>
	
    <h3></h3>
</div>
<!-- kalender -->
<div class="pull-right">
	<div id="kalender"></div>
</div>

<?php 
include 'footer.php';

?>

