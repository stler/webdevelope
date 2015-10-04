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
	}
}