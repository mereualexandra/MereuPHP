-- create the database
CREATE DATABASE caietul_mereu CHARACTER SET=utf8mb4;

-- create the user and grant privileges
-- CREATE USER 'mereuuser'@'localhost' IDENTIFIED BY 'mereupass';
GRANT ALL ON caietul_mereu.* TO 'mereuuser'@'localhost';

-- create the user and grant privileges
-- CREATE USER 'mereuuser'@'127.0.0.1' IDENTIFIED BY 'mereupass';
GRANT ALL ON caietul_mereu.* TO 'mereuuser'@'127.0.0.1';

--if you run the commans from phpmyadmin, comment the next line
USE caietul_mereu;

-- create the tables
CREATE TABLE user_roles (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(128) UNIQUE
) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE users (
   id INTEGER AUTO_INCREMENT PRIMARY KEY,
   first_name VARCHAR(128),
   last_name VARCHAR(128),
   email VARCHAR(128) UNIQUE,
   password VARCHAR(128) NOT NULL,
   role_id INTEGER NOT NULL,
   send_notification BOOLEAN DEFAULT FALSE,
   FOREIGN KEY(role_id) REFERENCES user_roles(id) ON DELETE RESTRICT
) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

create table debt_types (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(128) NOT NULL UNIQUE,
    description TEXT,
    no_of_notifications INTEGER DEFAULT 0
) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE debts (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    amount DECIMAL(10,2) NOT NULL,
    reason TEXT,
    date DATE NOT NULL,
    status VARCHAR(128) NOT NULL,
    from_user_id INTEGER NOT NULL,
    to_user_id INTEGER NOT NULL,
    debt_type_id INTEGER NOT NULL,
    FOREIGN KEY(from_user_id) REFERENCES users(id) ON DELETE RESTRICT,
    FOREIGN KEY(to_user_id) REFERENCES users(id) ON DELETE RESTRICT,
    FOREIGN KEY(debt_type_id) REFERENCES debt_types(id) ON DELETE RESTRICT
) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- this table is used to keep track of the migrations that have been run
CREATE TABLE migrations (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(128) NOT NULL UNIQUE,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- insert the default roles
INSERT INTO user_roles (name) VALUES ('admin');
INSERT INTO user_roles (name) VALUES ('user');
INSERT INTO user_roles (name) VALUES ('guest');

-- insert the default debt types
INSERT INTO debt_types (name, description) VALUES ('one_time', 'A one time debt. Ussually used for debts for not so close friends.');
INSERT INTO debt_types (name, no_of_notifications) VALUES ('for_friends', 101);
INSERT INTO debt_types (name, no_of_notifications) VALUES ('for_colleagues', 5);

-- insert the default users
INSERT INTO users (first_name, last_name, email, password, role_id) VALUES ('admin', 'admin', 'admin@admin.com', 'admin', 1);
INSERT INTO users (first_name, last_name, email, password, role_id) VALUES ('user', 'user', 'user@user.com', 'user', 2);

-- insert some debts
INSERT INTO debts (amount, reason, date, status, from_user_id, to_user_id, debt_type_id) 
VALUES (100, 'for a beer', '2020-01-01', 'pending', 1, 2, 1);
Insert INTO debts (amount, reason, date, status, from_user_id, to_user_id, debt_type_id)
VALUES (200, 'for a pizza', '2020-01-01', 'pending', 2, 1, 1);

-- insert the migration
INSERT INTO migrations (name) VALUES ('create_db_1');