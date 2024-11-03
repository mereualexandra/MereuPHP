# Routing Process Documentation

This guide outlines how to set up routing for the application, including configuring the `.htaccess` file, implementing the `Router` class, and initializing routing in `index.php`.

---

## 1. Configuring `.htaccess` for URL Routing

The `.htaccess` file is a configuration file used by Apache to manage URL routing. It enables "pretty URLs" by routing all requests to a central file (`index.php`), except those pointing to actual files or directories.

### `.htaccess` Configuration
1. In the project root directory, create or edit the `.htaccess` file.
2. Add the following configuration to route all requests to `index.php`:

    ```apache
    # Enable RewriteEngine
    RewriteEngine On

    # Redirect all requests to index.php except actual files and directories
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php [QSA,L]
    ```

   **Explanation:**
   - `RewriteEngine On` enables URL rewriting.
   - `RewriteCond %{REQUEST_FILENAME} !-f` and `RewriteCond %{REQUEST_FILENAME} !-d` check if the request is for a real file or directory, bypassing them if so.
   - `RewriteRule ^(.*)$ index.php [QSA,L]` redirects all other requests to `index.php`, preserving query parameters (`QSA`) and marking it as the last rule (`L`).

---

## 2. Setting Up the `Router` Class

The `Router` class processes incoming requests by matching the URI to predefined routes, loading the appropriate controller, and calling the specified method.

### `Router.php` Setup
1. In the `config` directory, create a `Router.php` file.
2. Define an array of routes and implement the `Router` class:
---

## 3. Initializing the Router in `index.php`

The `index.php` file acts as the main entry point for the application, routing all requests through the `Router` class.

### `index.php` Setup
1. In the project root, open `index.php`.
2. Include the `Router.php` file, initialize the `Router` instance, and call `direct()`.
---

## 4. Adding New Routes

To add a new page, simply add a new route to the `$routes` array in `Router.php`. Each entry in the array should map a URL path to a controller and method. 
Then, create the `ProductController` with the `index` method if it doesn't already exist. Once added to `$routes`, the new route will be automatically handled by the router, enabling access to the new page without any additional configuration.
---

This setup enables clean URLs, routes each request to the appropriate controller and method, and allows for quick addition of new pages by simply updating the `$routes` array in `Router.php`.