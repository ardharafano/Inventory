<?php
include 'db.php';

$username = (htmlentities($_POST['username']));
$password = (htmlentities(md5($_POST['password'])));

$query    = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
$runquery = $connect->query($query);

if($runquery->num_rows > 0){
 session_start();
 $_SESSION['username'] = $username;
 header("Location: admin\index.php");
} else {
 echo '<h1>Username atau Kata Sandi Salah!</h1>';
}

?>
