# Models Folder

The `models` folder contains classes that represent the data structure and business logic of your application. Each model corresponds to a database table and provides an interface for interacting with data, including creating, retrieving, updating, and deleting records.

## How to Write a Model
1. **Define the Class:** Create a new file for each model (e.g., `User.php`), and define a class representing the data entity.
2. **Write Methods for Business Logic:** Add methods that represent the operations allowed for this model (e.g., `create`, `update`, `findById`).

## Example
```php
// models/User.php
class User {
    // Method to retrieve all users
    public static function getAllUsers($id) {
        // Query database to retreive all users
    }

    // Method to retrieve a user by ID
    public static function findById($id) {
        // Query database to find user by ID
    }
}
```