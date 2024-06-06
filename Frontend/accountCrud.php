<?php
    include_once '../classes/Class.fetchUser.php';
    $users = new user();
    $users->fetchuser();
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../classes/Class.register.php" method="post">
        <label for="username">Username</label><br>
        <input name="username" type="text"><br><br>

        <label for="password">password</label><br>
        <input name="password" type="password"><br><br>

        <label for="rol">rol</label><br>
        <select name="rol">
            <option value="0">User</option>
            <option value="1">Admin</option>
        </select>

        <button type="submit">Submit</button>
    </form>

    <br><br><br>

    <form action="../classes/Class.deleteUSer.php">
        <label for="Users">Users</label>
        <select name="Users">
            <?php foreach($users->fetchuser() as $user): ?>
                <option value="<?php echo $user['id'] ?>"><?php echo $user['username'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Delete</button>
    </form>
</body>
</html>