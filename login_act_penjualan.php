 <?php 
session_start();
include 'admin/config.php';
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$pas=md5($pass);
$query=mysqli_query($connect,"select * from admin_penjualan where uname='$uname' and pass='$pass'")or die(mysqli_error());
if(mysqli_num_rows($query)==1){
$_SESSION['uname']=$uname;
header("location:penjualan/index.php");
}else{
header("location:index_penjualan.php?pesan=gagal")or die(mysqli_error());
// mysqli_error();
}
// echo $pas;
?>
 
