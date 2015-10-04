<?php
	$dbname = "lesson2";
	$host = "localhost";
	$username = "root";
	require_once ("classes//MySqlDBClass.php");
	$pdo = new MySqlDB ( $host, $dbname, $username );
	$data = $pdo->selectAll ( "users" );
	
	while( $raw = $data->fetch() ){
		echo ($raw["name"]);
	}

?>
<form name="f1" method="post" action="index.php">
	<input name="link" type="hidden" value="index.php" />
	
 	Введите имя и фамилию: <br />
 	<input name="name" type="text" size="25" maxlength="40" placeholder="Иван Иванов" required="required" autofocus="autofocus"/> 
 	<br /><br />
 	
 	Логин: <br />
 	<input name="login" type="password" size="20" maxlength="40" required="required">
 	<br /><br />
 	 	
 	Пароль: <br />
 	<input name="passwd" type="password" size="20" maxlength="40" placeholder="************"> 
 	<br /><br />
 	
 	E-mail: <br />
 	<input type="email" placeholder="name@gmail.com"> <br /><br />
 </form>
 	