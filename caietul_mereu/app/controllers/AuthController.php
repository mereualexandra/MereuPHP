<?php
require_once "app/models/User.php";

class AuthController {
    public static function login(){
        if (isset($_SESSION["request_user"])){
            header("Location: /caietul_mereu");
            return;
        }
        if(!isset($_POST["email"])){
            require_once "app/views/auth/login.php";
            return;
        }

        // POST
        $email = htmlentities($_POST["email"]);
        $pass = $_POST["password"];

        $user = User::getUserByEmail($email);

        if(!$user || !password_verify($pass, $user["password"])){
            $_SESSION["login_error"] = "Invalid email or password!";
            require_once "app/views/auth/login.php";
        } else {
            // login successful
            $_SESSION["request_user"] = $user;
            header("Location: /caietul_mereu");
        }
    }

    public static function logout(){
        session_start();
        session_destroy();
        header("Location: /caietul_mereu");
    }

    public static function landing_page(){
        require_once "app/views/landing_page.php";
    }
}
?>