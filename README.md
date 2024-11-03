
# Caietul Mereu

## Overview

**Caietul Mereu** is a PHP-based application following the MVC (Model-View-Controller) design pattern. This project features a custom routing system, PDO-based database management, and structured folders for models, views, controllers, migrations, and configurations.

## Features

- **Custom MVC Structure**: Organized models, views, and controllers for clean, maintainable code.
- **Routing System**: Routes defined in a centralized configuration with `.htaccess` handling URL rewriting.
- **Database Interaction with PDO**: Secure and flexible database access.
- **Migration System**: SQL-based migrations for consistent database updates.

## Folder Structure

- **config/**: Configuration files, including the router setup and database connection.
- **controllers/**: Controller classes handling application logic and communication between models and views.
- **models/**: Model classes representing data and business logic.
- **views/**: View files for the user interface, outputting data.
- **migrations/**: SQL files containing database schema changes for tasks.
- **public/**: Publicly accessible files.

## Setup

### Prerequisites

- **PHP** 7.4 or later
- **XAMPP** with Apache server and MySQL (for easy local development)
- **Composer** (if using Composer packages)

### Installation

#### 1. Install XAMPP
- [Download XAMPP](https://www.apachefriends.org/index.html) and follow the installation instructions for your operating system.
- Open the XAMPP control panel and start **Apache** and **MySQL** services.

#### 2. Clone the Repository
   Open your XAMPP `htdocs` folder (default location: `C:\xampp\htdocs` on Windows or `/Applications/XAMPP/htdocs` on macOS) and clone the repository there:
   ```bash
   cd /path/to/xampp/htdocs
   git clone https://github.com/mereualexandra/MereuPHP.git
   cd MereuPHP
   ```

#### 3. Configure the Database
   - Open the XAMPP control panel, click **Admin** next to MySQL to access phpMyAdmin.
   - Create a new database for the project (e.g., `caietul_mereu`).
   - Edit `config/database.php` with your database credentials (usually `root` as the username with an empty password for XAMPP).

#### 4. Set Up Routing
   - Make sure `.htaccess` is enabled in XAMPP by editing `httpd.conf`. Open XAMPP’s `apache/conf/httpd.conf` file, and ensure these lines are uncommented:
     ```apache
     LoadModule rewrite_module modules/mod_rewrite.so
     ```
   - Restart Apache in the XAMPP control panel.

#### 5. Run Migrations
   - Use the SQL files in the `migrations/` folder to update the database structure in phpMyAdmin or using a database client.

### Running the Application

To view the application, open your browser and go to:

```
http://localhost/caietul_mereu/
```

## Usage

### Adding a New Route

1. Define a new route in the `config/Router.php` file:
   ```php
   $routes = [
       "path/to/your/route" => ["ControllerName", "methodName"],
   ];
   ```
2. Add the corresponding method in the specified controller.

### Database Queries

This project uses PDO for secure and flexible database interactions. Refer to `config/Database.php` for connection setup and example queries.