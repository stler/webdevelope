<?php
require_once("connection_database.php");

if(isset($_GET['login']))
{
    $pdo->delete($_GET['login']);
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Личный кабинет</title>
</head>
<body>

<p align="right"><a href="personal_account.php">В личный кабинет</a></p>
<p align="right"><a href="index.php">На главную</a></p><br />

<h1><p align="center">Личный кабинет пользователя</p></h1> <br /><br />

<p><a href="update.php">Изменить личные данные</a></p>

</body>
</html>
