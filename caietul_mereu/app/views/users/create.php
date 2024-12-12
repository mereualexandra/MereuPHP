<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <form action="create" method="post">
        <input type="hidden" name="is_post" value="1">
        <p><label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" \
            value = "<?= $_SESSION['create_user']['user']['first_name'] ?>">
        </p>
        <p><label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name"\
            value = "<?= $_SESSION['create_user']['user']['last_name'] ?>">
        </p>
        <p style="color: red;">
            <?php 
            if (isset($_SESSION['create_user']["errors"]['last_name_error'])):
                echo $_SESSION['create_user']["errors"]['last_name_error'];
                unset($_SESSION['create_user']["errors"]['last_name_error']);
                endif;
            ?>
        </p>
        <p><label for="email">Email</label>
            <input type="text" name="email" id="email"\
            value = "<?= $_SESSION['create_user']['user']['email'] ?>">
        </p>
        <p style="color: red;">
            <?php 
            if (isset($_SESSION['create_user']["errors"]['email_error'])):
                echo $_SESSION['create_user']["errors"]['email_error'];
                unset($_SESSION['create_user']["errors"]['email_error']);
                endif;
            ?>
        </p>
        <p><label for="password">Password</label>
            <input type="password" name="password" id="password">
        </p>
        <p style="color: red;">
            <?php 
            if (isset($_SESSION['create_user']["errors"]['password_error'])):
                echo $_SESSION['create_user']["errors"]['password_error'];
                unset($_SESSION['create_user']["errors"]['password_error']);
                endif;
            ?>
        </p>

        <p><label for="role">Role</label>
            <select name="role_id" id="role_id">
                <?php foreach ($roles as $role) : ?>
                    <option value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <input type="submit" value="Create">
    </form>
    
</body>
</html>