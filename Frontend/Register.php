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
</body>
</html>