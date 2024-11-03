<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
    <title>404 Not found</title>
</head>
<body>
    <h1>404 Not found</h1>
    <p><?php array_key_exists('error', $_SESSION)? $_SESSION['error'] : 'Page not found' ?></p>
</body>
</html>