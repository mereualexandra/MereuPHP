
# Hosting a PHP Project on a Free Server

This guide will walk you through the steps to host your PHP application online using a free hosting provider. This example uses popular free hosts that support PHP and MySQL.

## 1. Choose a Free Hosting Provider

Some popular free hosting options include:
- **InfinityFree**: Free PHP hosting with unlimited disk space and bandwidth, and MySQL support.
- **AwardSpace**: Offers free PHP and MySQL hosting with 1 GB of storage and a 5 GB monthly bandwidth cap.

Each platform may vary slightly in setup, so here’s a general guide that applies to most.

## 2. Sign Up for Hosting

- Go to the website of your chosen hosting provider (e.g., [InfinityFree](https://infinityfree.net)).
- Sign up and verify your account. You’ll then have access to a control panel where you can manage your site, databases, and files.

## 3. Create a New Website on Your Hosting Account

- In your hosting control panel, create a new website or project. You’ll often be asked to provide a site name and subdomain.
- Take note of the subdomain URL, as this will be the address of your hosted application.

## 4. Set Up a Database

Since your project uses a MySQL database, you’ll need to set one up:

1. **Locate the Database Section**: In the control panel, find the option to create a new MySQL database.
2. **Create a New Database**: Enter a database name, username, and password. Write down these details, as you’ll need them to connect your application to the online database.
3. **Copy Database Connection Details**: Note the `hostname`, which might look like `mysql.hostingprovider.com` or `localhost`.

## 5. Update Your Database Configuration

Open your project’s database configuration file (`config/database.php`) and update it with the new connection details from your hosting provider:

```php
<?php
$host = 'your_host';  // e.g., 'localhost' or 'mysql.hostingprovider.com'
$dbname = 'your_database_name';
$user = 'your_database_username';
$password = 'your_database_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
```

## 6. Upload Your Project Files

1. **Access the File Manager**: Most free hosting providers have a "File Manager" in the control panel.
2. **Upload Files**:
   - Go to the `public_html` or `htdocs` directory.
   - Upload all your project files, including the `public` folder contents, into this directory.
3. **Alternatively, Use FTP**:
   - Many hosts provide FTP access. Use an FTP client like [FileZilla](https://filezilla-project.org/) to upload files.
   - Log in with your FTP credentials, navigate to `public_html`, and transfer your files.

## 7. Set Up URL Routing with `.htaccess`

Ensure your `.htaccess` file is uploaded correctly to handle routes. If needed, verify that `.htaccess` rules work with the hosting provider by checking the configuration:

```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]
```

## 8. Import Database Structure

1. **Access phpMyAdmin**:
   - In your hosting control panel, find and open phpMyAdmin.
2. **Import Your Database**:
   - Open the database you created and go to the **Import** tab.
   - Choose your SQL file (usually in `migrations/`) and import it. This will create the necessary tables and structure.

## 9. Test Your Application

1. Open your website URL in the browser (e.g., `https://yoursite.infy.uk/`).
2. Navigate through the app to ensure routes, database connections, and pages are working as expected.

## Optional: Troubleshooting Tips

- **500 Internal Server Error**: This usually points to an issue in `.htaccess`. Ensure mod_rewrite is enabled on your host.
- **Database Errors**: Double-check database credentials and ensure the imported SQL file matches your code’s table structures.
- **Enable Error Reporting**: For debugging, temporarily enable error reporting in PHP by adding:
   ```php
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
   ```

---

By following these steps, your PHP project should be hosted and accessible on a free hosting provider.
