<?php
require_once('../DB/DB.php');

class user extends DBConnectie{

    public $username;
    public $password;
    public $rol;
    public $id;

    public function fetchuser(){
        $query = 'SELECT * FROM users';

        $this->connect();
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->conn = null;

        return $users;
    }
}

?>