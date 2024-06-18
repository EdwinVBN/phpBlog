<?php
    require_once('../classes/Class.fetchpost.php');
    $posts = new FetchPosts();
    $allPost = $posts->fetchPost();
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
        <a href="./login.php">Login</a>
        <h1>Overzicht</h1>
    </header>
    <section>

    </section>
    
</body>
</html>