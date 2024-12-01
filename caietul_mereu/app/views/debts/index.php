<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
    <title>Debts</title>
</head>
<body>
<h1>All Debts</h1>
<table>
    <tr>
        <th>Amount</th>
        <th>Reason</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($debts as $debt) : ?>
        <tr>
            <td><?= $debt["reason"] ?></td>
            <td><?= $debt["amount"] ?></td>
            <td><?= $debt["status"] ?></td>
            <td>
                <a href="show?id=<?= $debt["id"] ?>">Show</a> |
                <a href="edit?id=<?= $debt["id"] ?>">Edit</a>
        </tr>
    <?php endforeach; ?>
    
</body>
</html>