<?php
require_once 'app/models/User.php';
require_once 'app/models/Debt.php';

$users = User::getAllUsers();

echo "<p>Users:</p>";
foreach ($users as $user) {
    echo "<pre>";
    print_r($user);
    echo "</pre>";
}

$debts = Debt::getAllDebts();
echo "<p>Debts:</p>";
foreach ($debts as $debt) {
    echo "<pre>";
    print_r($debt);
    echo "</pre>";
}


?>