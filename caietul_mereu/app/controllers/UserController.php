<?php
require_once "app/models/User.php";

class UserController{
    public static function index() {

        $users = User::getAllUsers();
        require_once "app/views/users/index.php";
    }

    public static function show() {
        $user_id = $_GET['id'];
        $user = User::getUser($user_id);

        if ($user) {
            require_once "app/views/users/show.php";
        } else {
            $_SESSION['error'] = "User not found";
            require_once "app/views/404.php";
        }
    }

    public static function edit() {
        // GET is set when the user clicks the edit button
        // POST is set when the user submits the form
        // We need to handle both cases
        $user_id = $_GET['id'] ? $_GET['id'] : $_POST['id'];
        $user = User::getUser($user_id);

        if (!$user) {
            $_SESSION['error'] = "User not found";
            require_once "app/views/404.php";
            return;
        }

        // POST
        if (isset($_POST['id'])) {
            // empty session variables
            $_SESSION["edit_user"] = [];
            // Data validation
            $len_name = strlen($_POST['last_name']);
            if ($len_name < 1 || $len_name > 32) {
                $_SESSION["edit_user"]['last_name_error'] = 'Last name must be between 1 and 32 characters';
                header("Location: edit?id=".$_POST['id']);
                return;
            }

            if (strpos($_POST['email'], '@') === false) {
                $_SESSION["edit_user"]['email_error'] = 'Invalid email';
                header("Location: edit?id=".$_POST['id']);
                return;
            }

            User::updateUser(
                $user_id, 
                htmlentities($_POST['first_name']), 
                htmlentities($_POST['last_name']), 
                htmlentities($_POST['email'])
            );

            $_SESSION['success'] = 'Record updated';
            header("Location: edit?id=".$_POST['id']);
            return;
        }
        else {
            require_once "app/views/users/edit.php";
        }
    }
}
?>