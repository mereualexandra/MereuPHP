<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <p>
        <?php  
            if (isset($_SESSION["login_error"])) 
                echo $_SESSION["login_error"];
            unset($_SESSION["login_error"]);
        ?>
    <form method="post">
        <p><label for="email">Email</label>
            <input type="text" name="email" id="email">
        </p>
        <p><label for="password">Password</label>
            <input type="password" name="password" id="password">
        </p>
        <input type="submit" value="Login">
    </form>
</body>
</html>