<?php
require_once '../DB/DB.php';
session_start();

class CreatePost extends DBConnectie {
    public $title;
    public $description;
    public $content;
    public $user_id;

    public function __construct()
    {
        if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['content']) && isset($_SESSION['user_id'])){
            $this->title = $_POST['title'];
            $this->description = $_POST['description'];
            $this->content = $_POST['content'];
            $this->user_id = $_SESSION['user_id'];
        }
    }

    public function createPost()
    {

        if (empty($this->title) || empty($this->description) || empty($this->content) || empty($this->user_id)) {
            echo "All fields are required.";
            return false;
        }

        $query = "INSERT INTO posts (title, description, content, user_id) VALUES (:title, :description, :content, :user_id)";
        
        try{
        $this->connect();
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':user_id', $this->user_id);

        $stmt->execute();
        $this->conn = null;

        header("Location: ../Frontend/admin.php");
        exit;
        } catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
}

$createpost = new CreatePost();
$createpost->createPost();
?>