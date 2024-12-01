<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>User profile</title>
</head>
<body>
    <h1>User profile</h1>
    <p>First Name: <?= $user["first_name"] ?></p>
    <p>Last Name: <?= $user["last_name"] ?></p>
    <p>Email: <?= $user["email"] ?></p>
    <a href="edit?id=<?= $user["id"] ?>">Edit</a>
    <a href="index">Back</a>
</body>
</html>