<?php
require_once("connection_database.php");

if(isset($_REQUEST['enter'])) {

    if (empty($_REQUEST['name']) || empty($_REQUEST['login']) || empty($_REQUEST['password']) || empty($_REQUEST['email'])) {
        echo '<font color=ff0000>' . 'Вы заполнили не все поля' . '</font>';
    }

    else {
        if (($pdo->checkLogin($_REQUEST['login'])) && ($pdo->checkEmail($_REQUEST['email']))) {
            $data = array($_REQUEST['name'], $_REQUEST['login'], $_REQUEST['password'], $_REQUEST['email']);
            $pdo->insert($data);
            header("Location: personal_account.php");
        }

        else {
            echo '<font color=ff0000>' . 'Такой пользователь уже существует' . '</font>';
        }
    }
}


?>


<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Регистрация</title>
</head>
<body>

    <h1><p align="center">Форма для добавления пользователя в базу данных</p></h1>
    <form name="f1" method="post" action="index.php">
        <input name="link" type="hidden" value="index.php" />
        Имя: <br />
        <input name="name" type="text" size="25" maxlength="30" value="" /><br />
        Логин: <br />
        <input name="login" type="text" size="25" maxlength="30" value="" /><br />
        Пароль: <br />
        <input name="password" type="password" size="25" maxlength="30" value="" /> <br />
        Email: <br />
        <input name="email" type="text" size="25" maxlength="60" value="" /> <br /><br />
        <input type="submit" name="enter" value="Отправить данные" />
    </form>

</body>
</html>
