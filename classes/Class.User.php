<?php
require_once('../DB/DB.php');

class User extends DBConnectie {

    public $username;
    public $password;

    public function registerUser($data){

        try{
            $this->username = $_POST['username'];
            $this->password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $query = "INSERT INTO users (username, password) VALUES (:username, :password)";

            $this->connect();
            $stmt = $this->conn->prepare($query);

            $stmt->bindparam(':username', $this->username);
            $stmt->bindparam(':password', $this->password);

            $stmt->execute();

            $this->conn = null;
            

            header("Location: ../Frontend/home.php");

        }catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function loginUser($data){

        session_start();

        if (isset($_POST['username'])) {
            
        }

    }
}

$user = new User();
$user->registerUser($_POST);

?>