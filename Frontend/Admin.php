<?php 
   session_start();
   
   if (isset($_SESSION['rol']) && $_SESSION['rol'] === 0) {
       header("Location: ../Frontend/overzicht.php");
       exit();
   }

    include_once '../classes/Class.fetchPost.php';
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
        <nav>
            <a href="./accountCrud.php">account Beheren</a>
            <a href="../classes/Class.logout.php">logout</a>
        </nav>
    </header>
    <main>
        <section id="adminlink">
            <h1>Blog Maker</h1>
            <form action="../classes/Class.createPost.php" method="post">
                <label for="title">title</label><br>
                <input name="title" type="text">
                <br><br>
                <label for="description">description</label><br>
                <textarea name="description" id="" cols="30" rows="10"></textarea>
                <br><br>
                <label for="content">content</label><br>
                <textarea name="content" id="" cols="30" rows="10"></textarea>
                <br><br>
                <button type="submit">Post</button>
            </form>
            <h1>blog deleter</h1>
            <section>
                <form action="../classes/Class.deletePost.php" method="post">
                    <select name="deletetitle" id="">
                        <?php foreach( $allPost as $post ): ?>
                            <option value="<?php echo htmlspecialchars($post['title']); ?>"><?php echo htmlspecialchars($post['title']); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit">delete</button>
                </form>
            </section>
        </section>
        <section id="adminrecht">
            <section id="postoverzicht">
                <h2>Post Overzicht</h2>
                <?php foreach( $posts->fetchPost() as $posts ): ?>
                    <article>
                        <a href="post.php?id=<?php echo htmlspecialchars($posts['id']); ?>" id="Kop">
                            <?php echo htmlspecialchars($posts['title']); ?>
                        </a>
                        <br>
                        <p>created_on: <?php echo htmlspecialchars($posts['created_on']); ?> - updated_on: <?php echo htmlspecialchars($posts['updated_on'])?></p>
                    </article>
                <?php endforeach; ?>
            </section>
            <section id="updatepost">
                <form action="../classes/Class.updatePost.php" method="post" id="updateform">
                    <section id="updatetext">
                        <?php foreach( $allPost as $post ): ?>
                            <label for="<?php echo htmlspecialchars($post['title']); ?>">
                                <?php echo 'title: '. htmlspecialchars($post['title']); ?>
                            </label>
                            <label for="<?php echo htmlspecialchars($post['description']); ?>">
                                <?php echo 'description: '. htmlspecialchars($post['description']); ?>
                            </label>
                            <label for="<?php echo htmlspecialchars($post['content']); ?>">
                                <?php echo 'content: '. htmlspecialchars($post['content']); ?>
                                <?php echo "<br><br>"; ?>
                                <?php echo '_/[-{o}-]\_'; ?>
                                <?php echo "<br><br>"; ?>
                            </label>
                        <?php endforeach; ?>
                    </section>
                <section id="updatevak">
                    <select name="selectTitle" id="">
                        <?php foreach( $allPost as $post ): ?>
                            <option value="<?php echo htmlspecialchars($post['title']); ?>"><?php echo htmlspecialchars($post['title']); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input name="title" type="text" placeholder="title">
                    <input name="description" type="text" placeholder="description">
                    <input name="content" type="text" placeholder="content">
                    <button type="submit">update</button>
                </section>
                </form>
            </section>
        </section>
    </main>
</body>
<style>
    body{
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }
    header{
        background-color: #333;
        color: white;
        padding: 10px;
        text-align: center;
    }
    nav{
        display: flex;
        justify-content: space-around;
    }
    main{
        display: flex;
        justify-content: space-around;
    }
    #adminlink{
        width: 50%;
    }
    #adminrecht{
        width: 50%;
        display: flex;
        flex-direction: column;
    }
    #postoverzicht{
        border: 1px solid #333;
        padding: 10px;
        overflow-y: auto;
        height: 400px;
    }
    #updatepost{
        border: 1px solid #333;
        padding: 10px;
        overflow-y: auto;
        height: 300px;
    }
    #updateform{
        display: flex;
        flex-direction: row;
    }
    article{
        border-bottom: 1px solid #333;
        padding: 10px;
    }
    article h3{
        margin: 0;
    }
    article p{
        margin: 0;
    }
    form{
        display: flex;
        flex-direction: column;
    }
    form label{
        margin-bottom: 10px;
    }
    form input, form textarea{
        margin-bottom: 10px;
    }
    form button{
        width: 100px;
        padding: 10px;
        background-color: #333;
        color: white;
        border: none;
    }
    form button:hover{
        background-color: #555;
    }
    select{
        padding: 10px;
    }
    select option{
        padding: 10px;
    }
    select{
        margin-bottom: 10px;
    }
    select option{
        margin-bottom: 10px;
    }
    #updatetext{
        display: flex;
        flex-direction: column;
        flex: 1;
    }
    #updatevak{
        display: flex;
        flex-direction: column;
        flex: 1;
        position: absolute;
        left: 75%;
    }
    #Kop{
        font-size: 20px;
        font-weight: bold;
        text-decoration: none;
        color: black;
    }
</style>
</html>
