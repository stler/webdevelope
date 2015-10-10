<?php
class MySqlDB {
     private $manager;
     public function __construct($host, $dbname,  $username, $password = null){
        $dsn = "mysql:host=". $host . ";dbname=" . $dbname . ";" ;
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
         try {
        $this->manager = new PDO($dsn, $username, $password, $options);

         } catch (PDOException $e) {
             die('Подключение не удалось' . $e->getMessage());
         }

}
    public function selectAll($table){
        $stmt = "SELECT * FROM $table";
        return $this->manager->query($stmt);
    }

    

    public function insert($table, $fields, $data) {
        $stmt = $this->manager->prepare("INSERT INTO $table $fields VALUES $data");
        $stmt->execute();
    }

    public function update($table, $data) {
         $stmt = $this->manager->prepare("UPDATE $table  SET UserName=?, Password=?, Email=? WHERE UserName=? ");
         $stmt->execute(array($data["UserName"],$data["Password"],$data["Email"], $data["oldName"]));
    }
    

    public function delete($table, $deleteValue){
        $stmt = $this->manager->prepare("DELETE FROM $table WHERE `Username` = '$deleteValue'");
        $stmt->execute();
        
    }
     public function addUser($table , $name, $email, $pass) {
        $fields = "(`UserName`, `Email`, `Password`)";
        $data = "('" . $name . "', " . "'" . $email . "', " . "'" . $pass . "')";
        $this->insert($table, $fields, $data);
     }

    public function showUsers($table) {
        $stmt = $this->selectAll($table);
        while($row = $stmt->fetch()){
        echo "<tr><td>" . $row["UserName"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Password"] ."</td></tr>";
     } 
 }

    

    }


?>