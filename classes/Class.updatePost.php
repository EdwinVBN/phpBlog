<?php
include_once '../DB/DB.php';

class UpdatePost extends DBConnectie {

    public $title;
    public $description;
    public $content;
    public $postId;
    public $selectTitle;
    public $date;
    public function __construct() {
        if (isset($_POST['selectTitle'])) {
            $this->selectTitle = $_POST['selectTitle'];
        }
        if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['content'])){
            $this->title = $_POST['title'];
            $this->description = $_POST['description'];
            $this->content = $_POST['content'];
            $this->date = date('Y-m-d H:i:s');
        }
    }

    public function fetchPostId(){
        $query = 'SELECT id FROM posts where title = :selectTitle';

        $this->connect();
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':selectTitle', $this->selectTitle);

        $stmt->execute();

        $postId = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->conn = null;

        return $this->postId = $postId['id'];
    }

    public function updatePost(){
        $query = 'UPDATE posts SET title = :title, description = :description, content = :content, updated_on = :updated_on WHERE id = :id';

        $this->connect();
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':id', $this->postId);
        $stmt->bindParam(':updated_on', $this->date);

        $stmt->execute();
        $this->conn = null;

        header("Location: ../Frontend/admin.php");
        exit;
    }    
}

$updatepost = new UpdatePost();
$updatepost->fetchPostId();
$updatepost->updatePost();
?>