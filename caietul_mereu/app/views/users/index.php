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
<a href="/caietul_mereu/">Back</a>
<button><a href="create">Create</a></button>
<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <?php foreach ($users as $user) : ?>
        <tr>
            <td><?= $user["first_name"] ?></td>
            <td><?= $user["last_name"] ?></td>
            <td><?= $user["email"] ?></td>
            <td>
                <a href="show?id=<?= $user["id"] ?>">Show</a> |
                <a href="edit?id=<?= $user["id"] ?>">Edit</a> |
                <a href="delete?id=<?= $user["id"] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
