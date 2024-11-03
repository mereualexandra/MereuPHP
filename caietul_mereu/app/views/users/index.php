<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
    <title>Users</title>
</head>
<body>
<h1>All Users</h1>
<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
    </tr>
    <?php foreach ($users as $user) : ?>
        <tr>
            <td><?= $user["first_name"] ?></td>
            <td><?= $user["last_name"] ?></td>
            <td><?= $user["email"] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
