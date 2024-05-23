<?php
class DBConnectie{
    
    protected $conn;

    public function connect(){
        try{
            $conn = new PDO("mysql:localhost=db;dbname=phpblog", 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn = $conn;    
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
}
?>