<?php
    require_once('../classes/Class.fetchpost.php');
    $posts = new FetchPosts();
    $allPost = $posts->fetchPost();

    $limit = 6; 
    $totalPosts = count($allPost);
    $totalPages = ceil($totalPosts / $limit); 
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $limit; 

    $currentPosts = array_slice($allPost, $offset, $limit);
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
        <a href="../classes/Class.logout.php">logout</a>        
    </header>
    <section id="postoverzicht">
                <h2>Post</h2>
                <?php foreach( $currentPosts as $posts ): ?>
                    <article>
                        <a href="post.php?id=<?php echo htmlspecialchars($posts['id']); ?>" id="Kop">
                            <?php echo htmlspecialchars($posts['title']); ?>
                        </a>
                        <p>
                            <?php echo htmlspecialchars($posts['description']); ?>
                        </p>
                        <h5>
                            created_on: <?php echo htmlspecialchars($posts['created_on']); ?>
                             - 
                            updated_on: <?php echo htmlspecialchars($posts['updated_on'])?>
                        </h5>
                    </article>
                <?php endforeach; ?>
    </section>
    <div class="paginanav">
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo $page - 1; ?>"> vorige</a>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?php echo $i; ?>" <?php if ($i === $page) echo 'class="actief"'; ?>>
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>
        <?php if ($page < $totalPages): ?>
            <a href="?page=<?php echo $page + 1; ?>">volgende </a>
        <?php endif; ?>
    </div>
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
        padding: 10px 20px;
        background-color: #333;
        color: white;
    }
    header a{
        color: white;
        text-decoration: none;
    }
    #postoverzicht{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }
    article{
        margin: 10px;
        padding: 10px;
        border: 1px solid #333;
        width: 30%;
    }
    #Kop{
        font-size: 20px;
        font-weight: bold;
        text-decoration: none;
        color: black;
    }
    h5{
        font-size: 10px;
    }
    .paginanav {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    .paginanav a {
        margin: 0 5px;
        padding: 10px 15px;
        text-decoration: none;
        color: #333;
        border: 1px solid #333;
    }
    .paginanav a.actief {
        background-color: #333;
        color: white;
    }
    .paginanav a:hover {
        background-color: #555;
        color: white;
    }
</style>
</body>
</html>