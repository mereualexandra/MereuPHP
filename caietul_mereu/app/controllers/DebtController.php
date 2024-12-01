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

    public static function edit() {
        // GET is set when the debt clicks the edit button
        // POST is set when the debt submits the form
        // We need to handle both cases
        $debt_id = $_GET['id'] ? $_GET['id'] : $_POST['id'];
        $debt = Debt::getDebt($debt_id);

        if (!$debt) {
            $_SESSION['error'] = "Debt not found";
            require_once "app/views/404.php";
            return;
        }

        if (!isset($_SESSION["edit_debt"])) {
            $_SESSION["edit_debt"] = [
                "debt" => [
                    "amount" => $debt['amount'],
                    "reason" => $debt['reason'],
                    "status" => $debt['status']
                ]
            ];
        }

        // POST
        if (isset($_POST['id'])) {
            // empty session variables
            $_SESSION["edit_debt"] = [
                "debt" => $_POST
            ];

            // amount validation
            if (!is_numeric($_POST['amount']) || $_POST['amount'] < 0) {
                $_SESSION["edit_debt"]['amount_error'] = 'Amount must be a positive number';
                header("Location: edit?id=".$_POST['id']);
                return;
            }

            Debt::updateDebt(
                $debt_id, 
                htmlentities($_POST['amount']), 
                htmlentities($_POST['reason']), 
                htmlentities($_POST['status'])
            );

            $_SESSION["edit_debt"]['success'] = 'Debt updated';
        
            header("Location: edit?id=".$_POST['id']);
            return;
        }
        else {
            // GET
            require_once "app/views/debts/edit.php";
        }
    }
}
?>