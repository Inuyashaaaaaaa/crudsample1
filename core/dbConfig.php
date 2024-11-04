<?php  

define('BASE_URL', 'http://127.0.0.1/guzman/');

$host = "localhost";
$user = "root";
$password = "";
$dbname = "guzman";
$dsn = "mysql:host={$host};dbname={$dbname}";

$pdo = new PDO($dsn,$user,$password);
$pdo->exec("SET time_zone = '+08:00';");

?>