# Migrations Folder

This folder contains SQL files that apply structural changes to the database as required for specific tasks. Each file groups together all necessary modifications for a given task, such as creating, altering, or dropping tables and columns to implement new features or updates.

## Usage

- Each SQL file represents the database modifications needed for a particular task.
- Use clear and descriptive file names (e.g., `add_authentication_tables.sql`) to specify the purpose of the changes.
- Run these files in the order of tasks to ensure the database schema is updated consistently across environments.

This folder keeps track of database schema updates associated with development tasks, ensuring that all changes are documented and easily deployable.

# How to Write a Migration

To ensure consistency and proper documentation of database changes, follow these steps when writing a migration:

1. **Specify the Database:**
   Start by selecting the database you’re modifying. Replace `<database_name>` with the actual name of your database.

   ```sql
   USE <database_name>;
   ```

2. **Write the Migration Changes:**
- Add, modify, or delete tables, columns, indexes, or any other database objects as needed for the task.
- Use clear and descriptive SQL statements to ensure each step is understandable.
For example:
```sql
-- Create a new table for storing user information
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Add a new column to an existing table
ALTER TABLE orders
ADD COLUMN status VARCHAR(20) DEFAULT 'pending';
```

3. **Document the Migration:**
- After making the required changes, insert a record into the migrations table to log this migration. This step helps track changes and avoid reapplying migrations.
```sql
INSERT INTO migrations (migration_name)
VALUES ('<migration_name>');
```
- Replace `<migration_name>` with the name of the migration file.
- This table should at least contain migration_name and applied_at fields to record the migration details and the time it was applied.

This process ensures each migration is applied systematically and can be tracked effectively across development and production environments.