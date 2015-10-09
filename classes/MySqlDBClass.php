<?php
class MySqlDB {
	private $manager;
	public function __construct($host, $dbname, $username, $password = null) {
		$dsn = "mysql:host=" . $host . ";dbname=" . $dbname . ";";
		$options = array (
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
		);
		try {
			$this->manager = new PDO ( $dsn, $username, $password, $options );
		} catch ( PDOException $e ) {
			die ( 'Подключение не удалось: ' . $e->getMessage () );
		}
	}
	public function selectAll($table) {
		$stmt = "SELECT * FROM `". $table. "`";
		$result = $this->manager->query($stmt);
		return $result;
		
	}

	public function insert($table, $data) {
		$stmt = "INSERT INTO `" .$table. "` (`name`, `login`, `password`, `email`) VALUES ". $data;
		$this->manager->query($stmt);
	}
	
	public function delete($table, $login)
	{
		$stmt = "DELETE FROM `users` WHERE login='". $login. "'";
		$this->manager->query($stmt);
	}
	
	public function update($table, $login, $newname=NULL, $newlogin=NULL, $newpasswd=NULL, $newemail=NULL)
	{
		$stmt = "UPDATE `". $table. "` SET `name`='". $newname. "',`login`='". $newlogin. "',`password`='". $newpasswd. "',`email`='". $newemail. "' WHERE login='". $login. "'";
		$this->manager->query($stmt);
	}
}