# Controllers Folder
The `controllers` folder contains classes that handle user requests, interact with models, and return the appropriate responses. Each controller corresponds to a specific part of the application and manages the workflow between models and views.

## How to Write a Controller
1. **Define the Class**: Create a file for each controller (e.g., `UserController.php`).
2. **Write Methods for Actions**: Each method should represent an action, such as `index`, `show`, `create`, or `update`.
3. **Use Models to Access Data**: Interact with models to fetch or modify data as needed by each action.

## Example
```php
// controllers/UserController.php
class UserController {
    // Display a list of users
    public function index() {
        $users = User::getAll();
        require_once 'views/users/index.php';
    }

    // Show a specific user by ID
    public function show($id) {
        $user = User::findById($id);
        require_once 'views/users/show.php';
    }
}
```