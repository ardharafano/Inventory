<?php

$host  = 'localhost';
$user  = 'root';
$pass = '';
$db    = 'kios';

$connect = new mysqli($host, $user, $pass, $db);
if($connect->connect_error){
 echo 'Terjadi Kesalahan';
}

?>
