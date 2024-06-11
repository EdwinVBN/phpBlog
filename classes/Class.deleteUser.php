<?php
require_once('../DB/DB.php');

class DeleteUser extends DBConnectie{

    public $username;
    public $password;
    public $rol;
    public $id;


    public function __construct(){
        if (isset($_POST['userID'])){
            $this->id = $_POST['userID'];
        }
    }

    public function deleteUser(){
        $query = "DELETE FROM users WHERE id = :id";

        $this->connect();
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $result = $stmt->execute();

        $this->conn = null;

        if ($result) {
            // var_dump($result);
            // die();
            header("Location: ../Frontend/accountCrud.php");
            exit;
        } else {
            return false;
        }
    }
}

$deleteUser = new DeleteUser();
$deleteUser->deleteUser();

?>