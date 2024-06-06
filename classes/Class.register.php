<?php
require_once('../DB/DB.php');

class User extends DBConnectie {

    public $username;
    public $password;
    public $rol;

    public function __construct(){
        if (isset($_POST['username']) && isset($_POST['password']) ) {
            $this->username = $_POST['username'];
            $this->password = $_POST['password'];
            $this->rol = $_POST['rol'];
        }
    }
    

    public function registerUser($data){

        $query = "INSERT INTO users (username, password, rol) VALUES (:username, :password, :rol)";

        try{
            $this->connect();
            $stmt = $this->conn->prepare($query);
            $stmt->bindparam(':username', $this->username);
            $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);
            $stmt->bindparam(':password', $hashedPassword);
            $stmt->bindparam(':rol', $this->rol);
            
            
            $stmt->execute();
            $this->conn = null;
            

            header("Location: ../Frontend/Admin.php");
            exit();
        } catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
}

$user = new User();
$user->registerUser($_POST);
?>