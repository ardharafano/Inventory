 <?php 
session_start();
include 'admin/config.php';
$uname=$_POST['uname'];
$pass=$_POST['pass'];
mysqli_query($connect, "INSERT INTO admin(uname,pass) VALUES ('$uname', '$pass')");
if(mysqli_num_rows($query)==1){
$_SESSION['uname']=$uname;
header("location:register.php");
}else{
header("location:user.php")or die(mysqli_error());
// mysqli_error();
}
// echo $pas;
?>
 
