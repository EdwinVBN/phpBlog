<?php
require_once('../DB/DB.php');

class FetchPosts extends DBConnectie{


    public function fetchPost(){
        $query = 'SELECT * FROM posts';

        $this->connect();
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->conn = null;

        return $posts;
    }

    public function fetchOnePost($id){
        $query = 'SELECT * FROM posts WHERE id = :id';

        $this->connect();
        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(':id', $id);
        $stmt->execute();

        $posts = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->conn = null;

        return $posts;
    }


}

?>