<?php
require_once('../DB/DB.php');

class FetchComments extends DBConnectie{

    public function fetchComments($post_id){
        $query = 'SELECT * FROM comments WHERE post_id = :post_id';

        $this->connect();
        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(':post_id', $post_id);
        $stmt->execute();

        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->conn = null;

        return $posts;
    }

}
?>