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
             die('Подключение не удалось: ' . $e->getMessage());
         }

}
    public function selectAll(){
        $stmt = "SELECT name FROM user";
        return $this->manager->query($stmt);
    }
    public function insert( $data){
        $stmt = "INSERT INTO user VALUES " . $data . ";" ;
        $this->manager->query($stmt);
    }

    public  function delete($deletevalue){
        $stmt = "DELETE FROM user WHERE login = '" . $deletevalue . "'";
        $this->manager->query($stmt);
    }
    public function update($changefield,$newvalue,$login){
        $stmt = "UPDATE user SET " . $changefield . "= '" . $newvalue ."' WHERE (login='". $login ."');" ;
        $this->manager->query($stmt);
    }
    }

?>