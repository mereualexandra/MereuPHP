<?php

class Debt {
    public static function getAllDebts() {
        global $pdo;

        $sql = "SELECT * 
                FROM debts";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getDebt() {
        global $pdo;
        $debt_id = $_GET['id'];

        $sql = "SELECT * 
                FROM debts 
                WHERE id = :debt_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(":debt_id" => $debt_id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function updateDebt($debt_id, $amount, $reason, $status) {
        global $pdo;

        $sql = "UPDATE debts
                SET amount = :amount, reason = :reason, status = :debt_status
                WHERE id = :debt_id";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute(array(
            ":debt_id" => $debt_id,
            ":amount" => $amount,
            ":reason" => $reason,
            ":debt_status" => $status
        ));
    }
}
?>