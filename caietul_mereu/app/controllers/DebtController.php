<?php
require_once "app/models/Debt.php";

class DebtController{
    public static function index() {
        $debts = Debt::getAllDebts();
        require_once "app/views/debts/index.php";
    }

    public static function show() {
        $debt_id = $_GET['id'];
        $debt = Debt::getDebt($debt_id);

        if ($debt) {
            require_once "app/views/debts/show.php";
        } else {
            $_SESSION['error'] = "Debt not found";
            require_once "app/views/404.php";
        }

    }
}
?>