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
                WHERE debt_id = :debt_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(":debt_id" => $debt_id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>