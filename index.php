<?php
	$dbname = "lesson2";
	$host = "localhost";
	$username = "root";
	require_once ("classes//MySqlDBClass.php");
	$pdo = new MySqlDB ( $host, $dbname, $username );
		
	if(isset($_REQUEST["create"])){
		$data = "('". $_REQUEST["name"]. "', '". $_REQUEST["login"]. "', '". $_REQUEST["password"]. "', '". $_REQUEST["email"]. "')";
		$pdo->insert("users", $data);}
		
	if( isset($_REQUEST["update"]) )
		$pdo->update("users", $_REQUEST["oldlogin"], $_REQUEST["newname"], $_REQUEST["newlogin"], $_REQUEST["newpassdw"], $_REQUEST["newemail"]);
		
	if( isset($_REQUEST["delete"])) $pdo->delete("users", $_REQUEST["delete"]);
	
		

?>
<table width="100%">
  <tr>
  <td align="center">
    <form name="f1" method="post" action="index.php">
	Форма создания пользователя:
	<br /><br />
	
 	Введите имя и фамилию: <br />
 	<input name="name" type="text" size="25" maxlength="40" placeholder="Иван Иванов" required="required" autofocus="autofocus"/> 
 	<br /><br />
 	
 	Логин: <br />
 	<input name="login" type="text" size="20" maxlength="40" required="required">
 	<br /><br />
 	 	
 	Пароль: <br />
 	<input name="password" type="password" size="20" maxlength="40" placeholder="************"> 
 	<br /><br />
 	
 	E-mail: <br />
 	<input name="email" type="email" placeholder="name@gmail.com"> <br /><br />
 	<input type="submit" name="create">
  </form>
  </td>
  <td align="center">
  	<form name="f2" method="post" action="index.php">
	Форма обновления данных пользователя:
	<br /><br />
	
	Старый логин: <br />
 	<input name="oldlogin" type="text" size="20" maxlength="40" required="required">
 	<br /><br />
	
 	Введите новые имя и фамилию: <br />
 	<input name="newname" type="text" size="25" maxlength="40" placeholder="Иван Иванов" required="required" autofocus="autofocus"/> 
 	<br /><br />
 	
 	Новый логин: <br />
 	<input name="newlogin" type="text" size="20" maxlength="40" required="required">
 	<br /><br />
 	 	
 	Новый пароль: <br />
 	<input name="newpassdw" type="password" size="20" maxlength="40" placeholder="************"> 
 	<br /><br />
 	
 	Новый E-mail: <br />
 	<input name="newemail" type="email" placeholder="name@gmail.com"> <br /><br />
 	<input type="submit" name="update">
 </form>
  </td>
  </tr>
</table>

