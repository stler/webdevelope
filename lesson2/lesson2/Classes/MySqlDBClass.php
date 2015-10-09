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

     public function checkLogin($login)
    {
        $stmt = $this->manager->prepare("SELECT login FROM user WHERE login = ?");
        $stmt->execute(array($login));

        while($element = $stmt->fetch())
        {
            if($element['login'] == $login)
            {
                return false;
            }
        }
        return true;
    }

    public function checkEmail($email)
    {
        $stmt = $this->manager->prepare("SELECT email FROM user WHERE email = ?");
        $stmt->execute(array($email));

        while($element = $stmt->fetch())
        {
            if($element['email'] == $email)
            {
                return false;
            }
        }
        return true;
    }

    public function insert($data)
    {
            $stmt = $this->manager->prepare("INSERT INTO user ( name, login, password, email ) values (:name, :login, :password, :email)");
            $stmt->execute(array(':name' => $data[0],
                ':login' => $data[1],
                ':password' => $data[2],
                ':email' => $data[3],));
    }

    public function delete($login)
    {
        $stmt = $this->manager->prepare("DELETE FROM user WHERE login=?");
        $stmt->execute(array($login));
    }

    public function updateName($old_name, $new_name)
    {
        $stmt = $this->manager->prepare("UPDATE user SET name = ? WHERE name=?");
        $stmt->execute(array($new_name, $old_name));
    }

    public function updateLogin($old_login, $new_login)
    {
        $stmt = $this->manager->prepare("UPDATE user SET login = ? WHERE login=?");
        $stmt->execute(array($new_login, $old_login));
    }

    public function updatePassword($old_password, $new_password)
    {
        $stmt = $this->manager->prepare("UPDATE user SET password = ? WHERE password=?");
        $stmt->execute(array($new_password, $old_password));
    }

    public function updateEmail($old_email, $new_email)
    {
        $stmt = $this->manager->prepare("UPDATE user SET email = ? WHERE email=?");
        $stmt->execute(array($new_email, $old_email));
    }
}

?>



