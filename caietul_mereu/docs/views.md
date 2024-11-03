# Views Folder
The `views` folder contains the HTML and PHP code for presenting data to the user. Each view corresponds to a specific page or UI component in the application.

## How to Write a View
1. **Create a Subfolder for Each Feature**: For example, views related to users might be stored in a `views/users` folder.
2. **Use PHP to Embed Data**: Use PHP within HTML to dynamically display data passed from the controller.
3. **Keep Logic Minimal**: Avoid placing business logic in views; use controllers and models for that purpose.

## Example
```php
<!-- views/users/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?php echo htmlspecialchars($user->username); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
```