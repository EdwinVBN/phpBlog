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
        </section>
        <section id="adminrecht">

        </section>
    </main>
</body>
</html>