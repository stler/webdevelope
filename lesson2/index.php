<?php 
$dbname = "lesson2"; 
$host = "localhost"; 
$userName = "root"; 
require_once("classes\\MySqlDBClass.php"); 
$pdo = new MySqlDB($host, $dbname, $userName ); 
//$pdostmt = $pdo->selectAll();  пусть будет на память пример фетча
//while($row = $pdostmt->fetch()){ 
//echo $row['name'] ; 
//} 


if ( isset($_POST["Create"] ) && $_POST["Name"]!= null && $_POST["login"]!= null && $_POST["password"]!= null && $_POST["email"]!= null ){ 
$data = "(0,'" . $_POST["Name"] . "','" . $_POST["login"] ."','". $_POST["password"] . "','" . $_POST["email"] ."');"; 
$pdo->insert($data); 
} 
if (isset($_GET["login"])&& $_GET!= null) $pdo->delete($_GET["login"]);
if (isset($_POST["Update"])){
    if(isset($_POST["oldlogin"])&&$_POST["oldlogin"]!=null){
    if(isset($_POST["newName"])&& $_POST["newName"]!=null) $pdo->update("name",$_POST["newName"],$_POST["oldlogin"]);
    if(isset($_POST["newpassword"])&& $_POST["newpassword"]!=null) $pdo->update("password",$_POST["newpassword"],$_POST["oldlogin"]);
    if(isset($_POST["newemail"])&& $_POST["newemail"]!=null) $pdo->update("email",$_POST["newemail"],$_POST["oldlogin"]);
    if(isset($_POST["newlogin"])&& $_POST["newlogin"]!=null) $pdo->update("login",$_POST["newlogin"],$_POST["oldlogin"]);
    
}
}
?> 


<title>Create/update  new user</title>
</head>
<body>
    <br>  Create new user <br/> 
    <br/>
<form name="form" method="post" action="index.php">
    Name: <br />
    <input name="Name" type="text" size="25" maxlength="30" value="" /> <br />
    <br> login <br/>
    <input name="login" type="text" size="13" maxlength="20" value="" /> <br/>
    <br> password <br/>
    <input name="password" type="password" size="80" maxlength="40" value=""/> <br/>
    <br> email:<br/>
    <input name="email" type="email" size="25" maxlength="30" value=""/>
    <br> <br/>
<input type="submit" name="Create" value="Create new user" />
</form>
    <br> Change information  <br/>
    <br/>
    <form name="newform" method="post" action="index.php">
    Name: <br />
    <input name="newName" type="text" size="25" maxlength="30" value="" /> <br />
    <br> login <br/>
    <input name="oldlogin" type="text" size="13" maxlength="20" value="" /> <br/>
    <br> change login, write if you want change <br />
    <input name="newlogin" type="text" size="13" maxlength="20" value="" /> <br/>
    <br> password <br/>
    <input name="newpassword" type="password" size="80" maxlength="40" value=""/> <br/>
    <br> email:<br/>
    <input name="newemail" type="email" size="25" maxlength="30" value=""/>
    <br> <br/>
<input type="submit" name="Update" value="change information " />
</form>
</body>
</html>

