<?php
require_once '../DB/DB.php';
session_start();

class CreateComment extends DBConnectie {
    public $name;
    public $message;
    public $created_on;
    public $post_id;

    public function __construct()
    {
        if (isset($_POST['comment'])){
            $this->message = $_POST['comment'];
            $this->name = $_SESSION['username'];
            $this->post_id = $_POST['post_id'];
            $this->created_on = date('Y-m-d H:i:s');
        }
    }

    public function createComment()
    {

        if ( empty($this->message) ) {
            echo "niet leeg laten";
            return false;
        }

        $query = "INSERT INTO comments (post_id, name, message, created_on) VALUES (:post_id, :name, :message, :created_on)";
        
        try{
        $this->connect();
        $stmt = $this->conn->prepare($query);

        $stmt->bindparam(':post_id', $this->post_id);
        $stmt->bindparam(':name', $this->name);
        $stmt->bindparam(':message', $this->message);
        $stmt->bindparam(':created_on', $this->created_on);

        $stmt->execute();
        $this->conn = null;

        echo "<script>alert('Comment created');</script>";
        echo "<script>window.location.href = '../Frontend/post.php?id=" . $this->post_id . "';</script>";
        exit;
        } catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
}

$createcomment = new CreateComment();
$createcomment->createComment();
?>