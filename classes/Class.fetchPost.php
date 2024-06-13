<?php
require_once('../DB/DB.php');

class FetchPosts extends DBConnectie{

    public $title;
    public $description;
    public $content;
    public $created_on;
    public $updated_on;


    public function fetchPost(){
        $query = 'SELECT * FROM posts';

        $this->connect();
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->conn = null;

        return $posts;
    }
}

?>