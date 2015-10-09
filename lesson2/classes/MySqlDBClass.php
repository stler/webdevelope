<?php 
class MySql {
	private $manager;
	public function __construct($host, $dbname, $username, $password = null)
	{
		$dsn = "mysql:host=". $host. ";dbname=". $dbname. ";";
		$options =  array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
		try {
		$this->manager = new PDO($dsn, $username, $password, $options);
		} catch (PDOException $e) {
			die('Подключение не удалось: ' . $e->getMessage());
		}
	}
	public function selectAll()
	{

		$stmt = "SELECT * FROM user";
		return $this->manager->query($stmt);
	}
	public function insert ($table, $data)
	{
		$columns = array();
		$values = array();
	
		foreach ($data as $key => $value)
		{
			$key = mysql_real_escape_string($key . '');
			$columns[] = $key;
			
			if ($value === null)
			{
				$values[] = 'NULL';
			}
			else
			{
				$value = mysql_real_escape_string($value . '');							
				$values[] = "'$value'";
			}
		}
		
		$columns_s = implode(',', $columns);
		$values_s = implode(',', $values);
		
		$query = "INSERT INTO $table ($columns_s) VALUES ($values_s)";
		$result = $this->manager->query($query);
		return $this->manager->lastInsertId();
	}
	
	public function select($query)
	{

		$result = $this->manager->query($query);
		
		if (!$result)
			die(mysqli_error());
		
		return $result;
		
	}
	
	public function delete($table, $where)
	{

		$query = "DELETE FROM $table WHERE $where";
		$result = $this->manager->query($query);
		
		if (!$result)
			die(mysqli_error());
		
		return $result->rowCount();
		
	}
	
	public function update($table, $object, $where)
	{

		$sets = array();
	
		foreach ($object as $key => $value)
		{
			$key = mysql_real_escape_string($key . '');
			
			if ($value === null)
			{
				$sets[] = "$key=NULL";			
			}
			else
			{
				$value = mysql_real_escape_string($value . '');					
				$sets[] = "$key='$value'";			
			}			
		}
		
		$sets_s = implode(',', $sets);			
		$query = "UPDATE $table SET $sets_s WHERE $where";
		$result = $this->manager->query($query);
		
		if (!$result)
			die(mysql_error());
		return $result->rowCount();	
		
	}
}
?>