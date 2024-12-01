<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Debt details</title>
</head>
<body>
    <h1>Debt details</h1>
    <p>Amount: <?= $debt["amount"] ?></p>
    <p>Reason: <?= $debt["reason"] ?></p>
    <p>Status: <?= $debt["status"] ?></p>
    <a href="edit?id=<?= $debt["id"] ?>">Edit</a>
    <a href="index">Back</a>
</body>
</html>