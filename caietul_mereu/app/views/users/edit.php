<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?= $user["id"] ?>">
        <p><label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" value="<?= $user["first_name"] ?>">
        </p>
        <p><label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" value="<?= $user["last_name"] ?>">
        </p>
        <p>
            <?php  
                if (isset($_SESSION["edit_user"]) && isset($_SESSION["edit_user"]['first_name_error'])) 
                echo $_SESSION["edit_user"]['first_name_error'];
            ?>
        </p>
        <p><label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?= $user["email"] ?>">
        </p>
        <input type="submit" value=Update>
    </form>
    <a href="index">Back</a>
</body>
</html>