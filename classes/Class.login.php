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
        }
    }
    
    public function loginUser($data){

        session_start();


        if (isset($this->username) && isset($this->password)) {
            $query = 'SELECT * FROM users WHERE username = :username';
            try{

                $this->connect();
                $stmt = $this->conn->prepare($query);
                $stmt->bindparam(':username', $this->username);
                $stmt->execute();

                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->conn = null;

                

                
                if ($user && password_verify($this->password, $user['password'])) {
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['rol'] = $user['rol'];
                    $_SESSION['user_id'] = $user['id'];


                    if ($_SESSION['rol'] = 1){
                        header("Location: ../Frontend/Admin.php");
                    }else{
                        header("Location: ../Frontend/home.php");
                    }
                    exit();
                } else {
                    echo "Invalid username or password";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }  
        }

    }
}

$user = new User();
$user->loginUser($_POST);


?>