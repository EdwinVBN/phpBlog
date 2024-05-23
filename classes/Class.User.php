<?php
require_once('../DB.php');

class User extends DBConnectie {

    public $naam;
    public $password;

    public function registerUser($data){

        try{
            $this->naam = $data['naam'];
            $this->password = password_hash($data['password'], PASSWORD_BCRYPT);

            $query = "INSERT INTO users (naam, password) VALUES (:naam, :password)";

            $this->connect();
            $stmt = $this->conn->prepare($query);
            $stmt->bindparam(':naam', $this->naam);
            $stmt->bindparam(':password', $this->password);

        }
    }

}

?>