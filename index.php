<?php
	$dbname = "lesson2";
	$host = "localhost";
	$username = "root";
	require_once ("classes//MySqlDBClass.php");
	$pdo = new MySqlDB ( $host, $dbname, $username );
	
// 	$data = $pdo->selectAll ( "users" );
		
// 	while( $raw = $data->fetch() ){
// 		echo ($raw["name"]);}
	
	if(
			isset($_REQUEST["name"])
			&& isset($_REQUEST["login"])
			&& isset($_REQUEST["password"])
			&& isset($_REQUEST["email"])
			){
		$data = "(`". $_REQUEST["name"]. ", `". $_REQUEST["login"]. "`, `". $_REQUEST["password"]. "`, `". $_REQUEST["email"]. "`)";
		echo($data);
		$pdo->insert("users", $data);}
		

?>
<form name="f1" method="post" action="index.php">
	<input name="link" type="hidden" value="index.php" />
	
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
 	<input type="submit">
 </form>
 	