<?php

    session_start();

    require_once('../classes/Class.fetchpost.php');
    require_once('../classes/Class.fetchComment.php');
    $postId = $_GET['id'];

    // var_dump($postId);
    // die();

    $fetchposts = new FetchPosts();
    $posts = $fetchposts->fetchOnePost($postId);

    $fetchcomments = new FetchComments();
    $comments = $fetchcomments->fetchComments($postId);

    function terug(){
        if (isset($_SESSION['rol']) && $_SESSION['rol'] === 1) {
            return "../Frontend/Admin.php";
        } else {
            return "../Frontend/overzicht.php";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <a href="<?php echo terug(); ?>">Terug</a>
        <h2>Post</h2>
    </header>
    <section id="postoverzicht">
                <article id="post">
                    <h2 id="Kop">
                        <?php echo htmlspecialchars($posts['title']); ?>
                    </h2>
                    <h4 id="description">
                        <?php echo htmlspecialchars($posts['description']); ?>
                    </h4>
                    <h1 id="content">
                        <?php echo htmlspecialchars($posts['content']); ?>
                    </h1>
                    <h5>
                        created_on: <?php echo htmlspecialchars($posts['created_on']); ?>
                         - 
                        updated_on: <?php echo htmlspecialchars($posts['updated_on'])?>
                    </h5>
                </article>
                <section id="commentsection">
                    <?php foreach( $comments as $comment): ?>
                        <article>
                            <h4 id="username"><?php echo htmlspecialchars($comment['name']); ?></h4>
                            <p id="comment"><?php echo htmlspecialchars($comment['message']); ?></p>
                            <h5 id="info">posted_on: <?php echo htmlspecialchars($comment['created_on']); ?></h5>
                            <p>--</p>
                        </article>
                    <?php endforeach; ?>
                </section>
                <form action="../Classes/Class.createComment.php" method="post">
                    <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($postId); ?>">
                    <input type="text" name="comment" id="placecomment" placeholder="comment">
                    <input id="submitcomment" type="submit" value="submit">
                </form>
    </section>
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        header{
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #f4f4f4;
        }
        #postoverzicht{
            margin: 20px;
        }
        #post{
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
        }
        #Kop{
            font-size: 24px;
        }
        #description{
            font-size: 18px;
        }
        #content{
            font-size: 16px;
        }
        #commentsection{
            margin: 20px;
        }
        #username{
            font-size: 18px;
        }
        #comment{
            font-size: 16px;
        }
        #info{
            font-size: 14px;
        }
        #placecomment{
            margin: 20px;
            padding: 10px;
            width: 50%;
        }
        #submitcomment{
            padding: 10px;
            background-color: #f4f4f4;
            border: 1px solid #ccc;
        }
    </style>
</body>
</html>