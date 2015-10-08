<?php
require_once("classes\\MySqlDBClass.php");

$dbname = "lesson2";
$host = "localhost";
$username = "root";
$table = "user";
$pdo = new MySqlDB($host, $dbname, $username);

echo '<br />';
$pdostmt = $pdo->selectAll();
while($row = $pdostmt->fetch())
{
    echo $row['name'];

}
echo '<br />';
if(isset($_REQUEST['enter']))
{
$data = array($_REQUEST['name'],$_REQUEST['login'],$_REQUEST['password'],$_REQUEST['email']);
$pdo->insert($data);
    header('Location: /index.php');
    exit();
}

if(isset($_POST['enter2']))
{
    $data = array($_POST['name2'],$_POST['login2'],$_POST['password2'],$_POST['email2']);
    $pdo->update($data);
    header('Location: /index.php');
    exit();

}

if (isset($_GET['login1']))
{
        $login = $_GET['login1'];
        $pdo->delete($login);
        echo "Пользователь удачно удален";
    header('Location: /index.php');
    exit();
}

?>


<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Тег FORM</title>
</head>
<body>

<p align="center">Форма для добавления пользователя в базу данных</p>
<form name="f1" method="request" action="index.php">
    <input name="link" type="hidden" value="index.php" />
    Имя: <br />
    <input name="name" type="text" size="25" maxlength="30" value="" /><br />
    Логин: <br />
    <input name="login" type="text" size="25" maxlength="30" value="" /><br />
    Пароль: <br />
    <input name="password" type="password" size="25" maxlength="30" value="" /> <br />
    Email: <br />
    <input name="email" type="text" size="25" maxlength="60" value="" /> <br />
    <input type="submit" name="enter" value="Отправить данные" />
</form>
<p align="center">Форма для обновления пользователя в базу данных( * - новые данные)</p>
<form name="f2" method="post" action="index.php">
    <input name="link" type="hidden" value="index.php" />
    Имя *: <br />
    <input name="name2" type="text" size="25" maxlength="30" value="" /><br />
    Логин(введите логин пользовотеля, в чей профиль вы хотите внести измененния): <br />
    <input name="login2" type="text" size="25" maxlength="30" value="" /><br />
    Пароль *: <br />
    <input name="password2" type="password" size="25" maxlength="30" value="" /> <br />
    Email *: <br />
    <input name="email2" type="text" size="25" maxlength="60" value="" /> <br />
    <input type="submit" name="enter2" value="Изменить" />
</form>
</body>
</html>
