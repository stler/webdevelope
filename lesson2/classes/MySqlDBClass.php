<?php
class MySqlDB
{
    private $manager;
   public function __construct($host,$dbname, $username, $password = null)
   {
            $dsn = "mysql:host=" . $host . ";dbname=" . $dbname . ";";
            $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
            try
            {
                $this->manager = new PDO($dsn, $username, $password, $option);
            }
            catch (PDOException $e) {
                die('Подключение не удалось: ' . $e->getMessage());
            }
   }
    public function selectAll()
    {
        $stmt = "SELECT * FROM user";
        return $this->manager->query($stmt);
    }

    public function insert($data)
    {
        $STH = $this->manager->prepare("INSERT INTO user ( name, login, password, email ) values ( :name,:login,:password, :email)");
        $STH->execute(array(':name'=>$data[0],
            ':login'=>$data[1],
            ':password'=>$data[2],
            ':email'=>$data[3],));

    }
    public function update($data)
    {
        $STH = $this->manager->prepare("UPDATE user SET name=?, password=?, email=? WHERE login=? ");
        $STH->execute(array($data[0],$data[2],$data[3], $data[1]));

    }

    public function delete($login)
    {
        $STH = $this->manager->prepare("DELETE FROM user WHERE `login` = '$login'");
        $STH->execute();
    }

}

?>



