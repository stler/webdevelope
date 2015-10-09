<?php
require_once("connection_database.php");

if(isset($_REQUEST['enter']))
{
    if(isset($_REQUEST['choose_name']))
    {
        if (empty($_REQUEST['old_name']) || empty($_REQUEST['new_name'])) {
            echo '<font color=ff0000>' . 'Вы не заполнили поле Имя' . '</font>';
        }
        else {
            $pdo->updateName($_REQUEST['old_name'], $_REQUEST['new_name']);
        }
    }
    if(isset($_REQUEST['choose_login']))
    {
        if (empty($_REQUEST['old_login']) || empty($_REQUEST['new_login'])) {
            echo '<p><font color=ff0000>' . 'Вы не заполнили поле Логин' . '</font></p>';
        }
        elseif(!($pdo->checkLogin($_REQUEST['new_login']))) {
            echo '<p><font color=ff0000>' . 'Пользователь с логином ' . $_REQUEST['new_login'] . ' уже существует!' . '</font></p>';
        }
        else {
            $pdo->updateLogin($_REQUEST['old_login'], $_REQUEST['new_login']);
        }
    }
    if(isset($_REQUEST['choose_password']))
    {
        if (empty($_REQUEST['old_password']) || empty($_REQUEST['new_password'])) {
            echo '<p><font color=ff0000>' . 'Вы не заполнили поле Пароль' . '</font></p>';
        }
        else {
            $pdo->updatePassword($_REQUEST['old_password'], $_REQUEST['new_password']);
        }
    }
    if(isset($_REQUEST['choose_email']))
    {
        if (empty($_REQUEST['old_email']) || empty($_REQUEST['new_email'])) {
            echo '<p><font color=ff0000>' . 'Вы не заполнили поле E-mail' . '</font></p>';
        }
        elseif(!($pdo->checkLogin($_REQUEST['new_e-mail']))) {
            echo '<p><font color=ff0000>' . 'Пользователь с e-mail ' . $_REQUEST['new_email'] . ' уже существует!' . '</font></p>';
        }
        else {
            $pdo->updateEmail($_REQUEST['old_email'], $_REQUEST['new_email']);
        }
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Изменение данных</title>
</head>
<body>

    <h1><p align="center">Изменение личных данных</p></h1>
    <p align="right"><a href="personal_account.php">В личный кабинет</a></p>
    <p align="right"><a href="index.php">На главную</a></p><br />

    <b><i>Отметьте то, что вы хотели бы изменить!</i></b><br />

    <form name="f2" method="post" action="update.php">
        <input name="link" type="hidden" value="update.php" />
        Старое имя: <br />
        <input name="old_name" type="text" size="25" maxlength="255" value="" />
        <input name="choose_name" type="checkbox"/><br />
        Новое имя: <br />
        <input name="new_name" type="text" size="25" maxlength="255" value="" /><br />

        Старый логин: <br />
        <input name="old_login" type="text" size="25" maxlength="255" value="" />
        <input name="choose_login" type="checkbox"/><br />
        Новый логин: <br />
        <input name="new_login" type="text" size="25" maxlength="255" value="" /><br />

        Старый пароль: <br />
        <input name="old_password" type="password" size="25" maxlength="255" value="" />
        <input name="choose_password" type="checkbox"/><br />
        Новый пароль: <br />
        <input name="new_password" type="password" size="25" maxlength="255" value="" /><br />

        Старый e-mail: <br />
        <input name="old_email" type="text" size="25" maxlength="255" value="" />
        <input name="choose_email" type="checkbox"/><br />
        Новый e-mail: <br />
        <input name="new_email" type="text" size="25" maxlength="255" value="" /><br /><br />

        <input type="submit" name="enter" value="Изменить данные" />

    </form>
</body>
</html>
