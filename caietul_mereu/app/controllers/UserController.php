<?php
require_once "app/models/User.php";

class UserController{
    public static function index() {

        $users = User::getAllUsers();
        $create_permission = (
            isset($_SESSION["request_user"])  &&
            User::hasPermission($_SESSION["request_user"]["id"], "create_user")
        );

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

    static function data_validation() {
        $errors = [];
        $len_name = strlen($_POST['last_name']);
        if ($len_name < 1 || $len_name > 32) {
            $errors['last_name_error'] = 'Last name must be between 1 and 32 characters';  
        }
        if (strpos($_POST['email'], '@') === false) {
            $errors['email_error'] = 'Invalid email';
        }
        if (isset($_POST['password']) && strlen($_POST['password']) < 8) {
            $errors['password_error'] = 'Password must be at least 8 characters';
        }
        if (isset($_POST['role_id']) && !UserRole::getRole($_POST['role_id'])) {
            $errors['role_error'] = 'Invalid role';
        }

        return $errors;
    }

    public static function edit() {
        // GET is set when the user clicks the edit button
        // POST is set when the user submits the form
        // We need to handle both cases
        if (!isset($_SESSION["request_user"]) ||
            !User::hasPermission($_SESSION["request_user"]["id"], "edit_user")
        ){
            $_SESSION["error"]= "Invalid permissions";
            require_once "app/views/404.php";
            return;
        }

        $user_id = $_GET['id'] ? $_GET['id'] : $_POST['id'];

        $role = UserRole::getRole($_SESSION["request_user"]["role_id"]);
        if ($role["name"] != "admin" && $user_id != $_SESSION["request_user"]["id"]){
                $_SESSION["error"]= "Invalid permissions";
                require_once "app/views/404.php";
                return;
            }
        


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
            $errors = self::data_validation();
            if (count($errors) > 0) {
                $_SESSION["edit_user"] = $errors;
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

    public static function delete() {
        if (!isset($_SESSION["request_user"]) ||
            !User::hasPermission($_SESSION["request_user"]["id"], "delete_user")
            ){
                $_SESSION["error"]= "Invalid permissions";
                require_once "app/views/404.php";
                return;
            }
        

        $user_id = $_GET["id"];

        User::deleteUser($user_id);

        header("Location: index");
        return;
    }

    public static function create() {
        if (!isset($_SESSION["request_user"])){
            header("Location: /caietul_mereu");
        }
        //user is logged in => check user role
        $role = UserRole::getRole($_SESSION["request_user"]["role_id"]);
        if ($role["name"] != "admin"){
            $_SESSION["error"]= "Invalid permissions";
            require_once "app/views/404.php";
            return;
        }


        if (isset($_POST["is_post"])){
            // POST => create user
            $_SESSION["create_user"]["user"] = $_POST;

            $errors = self::data_validation();
            if (count($errors)){
                $_SESSION["create_user"]["errors"] = $errors;
                header("Location: create");
                return;
            }
           $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);

            User::createUser(
                htmlentities($_POST["first_name"]), 
                htmlentities($_POST["last_name"]),
                htmlentities($_POST["email"]), 
                $pass,
                htmlentities($_POST["role_id"])
            );
            header("Location: index");
        }
        // GET => show form
        if (!isset($_SESSION["create_user"]["user"])){
            $_SESSION["create_user"]["user"] = [
                "first_name" => "",
                "last_name" => "",
                "email" => ""
            ];
        }
        $roles  = UserRole::getAllRoles();
        require_once "app/views/users/create.php";
    }

}
?>