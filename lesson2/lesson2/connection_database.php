<?php
require_once("classes\\MySqlDBClass.php");

$dbname = "leson2";
$host = "localhost";
$username = "root";
$pdo = new MySqlDB($host, $dbname, $username);
?>