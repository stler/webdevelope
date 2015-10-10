<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="bootstrap.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-lg-4">
			<div class="CreateForm">
				<h2>Create new user</h2>
				<form name="Create" action="index.php" method="post" role="form">
				<div class="form-group">
				<input  class="form-control" name="name" type="text" size="20" maxlength="20" placeholder="Name">
				<input  class="form-control" name="password" type="text" size="20" maxlength="20" placeholder="Password">
				<input   class="form-control" name="email" type="text" size="20" maxlength="20" placeholder="Email">
				<input 	class="form-control" name="addUser" type="submit" value="Create">
				</div>
				</form>
			</div>


		</div>
		<div class="col-lg-4">
			<div class="ChangeForm">
				<h2>Change user's information</h2>
				<form name="Change" action="index.php" method="post" role="form">
				<div class="form-group">
				<input  class="form-control" name="oldName" type="text" size="20" maxlength="20" placeholder="Old name">
				<input class="form-control" name="UserName" type="text" size="20" maxlength="20" placeholder="New name">
				<input  class="form-control" name="Password" type="text" size="20" maxlength="20" placeholder="New password">
				<input   class="form-control" name="Email" type="text" size="20" maxlength="20" placeholder=" New email">
				<input   class="form-control" name="change" type="submit" value="change">
				</div>
				</form>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="DeleteForm">
				<h2>Delete user</h2>
				<form name="Delete" action="index.php" method="post" role="form">
				<div class="form-group">
				<input  class="form-control" name="username" type="text" size="20" maxlength="20" placeholder="Name">
				<input   class="form-control" name="Delete" type="submit" value="Delete">
				</div>
				</form>
			</div>
		</div>
	</div>
	
</div>
	
</body>
</html>


<?php
$dbname = "lesson2";
$host = "localhost";
$userName = "root";
require_once("classes\\MySqlDBClass.php");
$pdo = new MySqlDB($host, $dbname, $userName );
$table = "`Lesson2`.`users`";
 
if(isset($_POST["addUser"] ) && isset($_POST["name"]) && isset($_POST["password"]) && isset($_POST["email"])) {
	$pdo->addUser($table, $_POST["name"], $_POST["email"], $_POST["password"]);

}

if(isset($_POST["change"])) {
	$oldName = $_POST["oldName"];
	$data = array('oldName' => $_POST["oldName"] , 'UserName' => $_POST["UserName"], 'Password' => $_POST["Password"], 'Email' => $_POST["Email"]);
	$pdo->update($data);

}
if(isset($_POST["Delete"])) {
	$pdo->delete($table, $_POST["username"]);
}
   

echo "<table class='table table-striped'><caption>Список пользователей</caption><tr><th>Name</th><th>Password</th><th>Email</th></tr><tr><td>dwfwfw</td><td>dwgfwg</td><td>wdnwnf</td></tr>";
 $pdo->showUsers($table);
echo "</table>"
?>



