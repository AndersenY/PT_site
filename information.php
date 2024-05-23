<?php
// $link = mysqli_connect('127.0.0.1', 'root', 'Risen2darkwaters');
// if(!$link){
// 	die('Error:' . mysqli_error());
// }
// echo 'Good!';
// mysqli_close($link);
$servername = "127.0.0.1";
$username = "anderseny";
$password = "143263739";
$dbName = "first";

$link = mysqli_connect($servername, $username, $password);

if (!$link) {
    die("Ошибка подключения: " . mysqli_connection_error());
  }



$sql = "CREATE DATABASE IF NOT EXISTS $dbName";

if (!mysqli_query($link, $sql)) {
    echo "Не удалось создать БД";
  }
echo 'Good!';
  
mysqli_close($link);
?>
