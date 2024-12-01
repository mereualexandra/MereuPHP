<?php
$routes = [
    "caietul_mereu/debts/index" => ["DebtController", "index"],
    "caietul_mereu/debts/show" => ["DebtController", "show"],
    "caietul_mereu/debts/edit" => ["DebtController", "edit"],
    "caietul_mereu/users/index" => ["UserController", "index"],
    "caietul_mereu/users/show" => ["UserController", "show"],
    "caietul_mereu/users/edit" => ["UserController", "edit"],
];

class Router {
    private $uri;

    public function __construct() {
        // Get the current URI
        $this->uri = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
    }

    public function direct() {
        global $routes;
   
        if (array_key_exists($this->uri, $routes)) {

            // Get the controller and method
            [$controller, $method] = $routes[$this->uri];

            // Load the controller file if it hasn't been autoloaded
            require_once "app/controllers/{$controller}.php";

            // Call the method
            return $controller::$method();
        }
        
        require_once "app/views/404.php";
    }
}

?>