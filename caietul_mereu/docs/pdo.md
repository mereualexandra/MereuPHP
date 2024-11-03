# PDO (PHP Data Objects) Documentation

PHP Data Objects (PDO) is a database access layer that provides a consistent interface for accessing various databases in PHP. This document explains how to set up and use PDO for secure, efficient database interactions.

---

## 1. Setting Up PDO

PDO allows PHP to connect to databases like MySQL, PostgreSQL, SQLite, and more using a uniform API. To use PDO:
1. Make sure the PHP PDO extension is enabled in your PHP installation.
2. Use a DSN (Data Source Name) string to connect to your database.

### Example DSN Strings
- MySQL: `"mysql:host=localhost;dbname=your_database"`
- PostgreSQL: `"pgsql:host=localhost;port=5432;dbname=your_database"`
- SQLite: `"sqlite:/path/to/database.db"`

## 2. Executing Queries with PDO
### Preparing and Executing Statements
Prepared statements are a best practice in PDO as they secure queries against SQL injection by separating query structure from data.
#### Example: Select Query
```php
<?php
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
$stmt->execute(['email' => $userEmail]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
```
#### Explanation:
- `:email` is a named placeholder that binds to the value of `$userEmail`.
- `fetchAll(PDO::FETCH_ASSOC)` fetches the result as an associative array.
Insert Query Example

#### Insert Query Example
```php
<?php
$stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
$stmt->execute(['name' => $userName, 'email' => $userEmail]);
```

## 3.Fetching Data
PDO offers several ways to fetch data, depending on your needs:

- `fetch(PDO::FETCH_ASSOC):` Fetches the next row as an associative array.
- `fetch(PDO::FETCH_OBJ):` Fetches the next row as an anonymous object.
- `fetchAll(PDO::FETCH_ASSOC):` Fetches all results as an array of associative arrays.


## 4. Transaction Management
Transactions allow executing a series of operations as a single unit, ensuring data consistency.

### Example of a Transaction
```php
<?php
try {
    $pdo->beginTransaction();

    $stmt1 = $pdo->prepare("UPDATE accounts SET balance = balance - :amount WHERE id = :sender");
    $stmt1->execute(['amount' => $amount, 'sender' => $senderId]);

    $stmt2 = $pdo->prepare("UPDATE accounts SET balance = balance + :amount WHERE id = :receiver");
    $stmt2->execute(['amount' => $amount, 'receiver' => $receiverId]);

    $pdo->commit();
} catch (Exception $e) {
    $pdo->rollBack();
    echo "Failed: " . $e->getMessage();
}
```
### Explanation:
- `beginTransaction()` starts a transaction.
- `commit()` saves the changes if all operations succeed.
- `rollBack()` reverts changes if any operation fails.

## 5. Handling Errors with PDO
Using exception mode (`PDO::ERRMODE_EXCEPTION`) allows error handling via `try-catch` blocks. You can log errors or display custom messages to users.
```php
<?php
try {
    $stmt = $pdo->prepare("SELECT * FROM non_existent_table");
    $stmt->execute();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
```

## 6. Closing the Database Connection
In PDO, there’s no explicit `close` function. PDO automatically closes the connection when it goes out of scope. However, you can explicitly close it by setting the PDO instance to `null`.
```php
<?php
$pdo = null; // Close connection
?>
```




