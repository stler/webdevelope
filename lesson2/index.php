<?php 
//Накостылял, прям страшно. Чтот подумываю перестать ходить на Пыху, а тратить это время на изучение рельс.
$dbname = "lesson_2";
$table = "user";
$host = "localhost";
$username = "root";
require_once("classes\\MySqlDBClass.php");
$pdo = new MySql($host, $dbname, $username);
$pdostmt = $pdo->selectAll();
while ($row = $pdostmt->fetch())
{
	echo $row['name']. "\n";
}	
$pdostmt = $pdo->insert('user',array('name'=>'fourth', 'password'=>"pass"));
echo '<div>'.$pdostmt.'</div>';
$pdostmt = $pdo->selectAll();



while ($row = $pdostmt->fetch())
{
	echo $row['name']. "\n";
}	
echo '<div>'.$pdostmt = $pdo->Delete('user','name = "fourth"').'</div>';

$pdostmt = $pdo->selectAll();
while ($row = $pdostmt->fetch())
{
	echo $row['name']. "\n";
}	


$pdo->insert('user',array('name'=>'fourth', 'password'=>"pass"));
echo '<div>'.$pdostmt = $pdo->update('user',array('name'=>'qwerty'),'name = "fourth"').'</div>';
$pdostmt = $pdo->selectAll();
while ($row = $pdostmt->fetch())
{
	echo $row['name']. "\n";
}	
?>