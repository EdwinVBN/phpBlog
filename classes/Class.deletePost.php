<?php
include_once '../DB/DB.php';

class DeletePost extends DBConnectie {

    public $postId;
    public $deleteTitle;
    public $date;
    public function __construct() {
        if (isset($_POST['deletetitle'])) {
            $this->deleteTitle = $_POST['deletetitle'];
            $this->date = date('Y-m-d H:i:s');
        }
    }

    public function fetchPostId(){
        $query = 'SELECT id FROM posts where title = :deletetitle';

        $this->connect();
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':deletetitle', $this->deleteTitle);

        $stmt->execute();

        $postId = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->conn = null;

        return $this->postId = $postId['id'];
    }

    public function deletePost(){
        $query = 'DELETE FROM posts WHERE id = :id';

        $this->connect();
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $this->postId);

        $result = $stmt->execute();
        $this->conn = null;

        if($result){
            header("Location: ../Frontend/admin.php");
            exit;
        } else {
            return false;
        }
    }    


    

}

$deletepost = new DeletePost();
$deletepost->fetchPostId();
$deletepost->deletePost();
?>