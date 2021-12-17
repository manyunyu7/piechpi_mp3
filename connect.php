<?php
$servername = "localhost";
$username = "u481926856_henryaugusta";
$password = "j8srtj@Razkyyy";
$database = "u481926856_music";

$conn = new mysqli($servername, $username, $password, $database);
$connect = mysqli_connect($servername, $username, $password, $database);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
// $conn = mysqli_connect('localhost','root','','feylaboratory_music');
?>