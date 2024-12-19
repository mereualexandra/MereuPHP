USE caietul_mereu;

CREATE TABLE permissions (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(128) UNIQUE
) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE roles_permissions (
    role_id INTEGER,
    permission_id INTEGER,
    PRIMARY KEY(role_id, permission_id),
    FOREIGN KEY(role_id) REFERENCES user_roles(id) ON DELETE CASCADE,
    FOREIGN KEY(permission_id) REFERENCES permissions(id) ON DELETE CASCADE
) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- insert the default permissions
INSERT INTO permissions (id, name) VALUES (1, 'create_user');
INSERT INTO permissions (id, name) VALUES (2, 'read_user');
INSERT INTO permissions (id, name) VALUES (3, 'update_user');
INSERT INTO permissions (id, name) VALUES (4, 'delete_user');
INSERT INTO permissions (id, name) VALUES (5, 'create_debt');
INSERT INTO permissions (id, name) VALUES (6, 'read_debt');
INSERT INTO permissions (id, name) VALUES (7, 'update_debt');
INSERT INTO permissions (id, name) VALUES (8, 'delete_debt');

-- insert the default roles_permissions
-- admin = 1
INSERT INTO roles_permissions (role_id, permission_id) VALUES (1, 1);
INSERT INTO roles_permissions (role_id, permission_id) VALUES (1, 2);
INSERT INTO roles_permissions (role_id, permission_id) VALUES (1, 3);
INSERT INTO roles_permissions (role_id, permission_id) VALUES (1, 4);
INSERT INTO roles_permissions (role_id, permission_id) VALUES (1, 5);
INSERT INTO roles_permissions (role_id, permission_id) VALUES (1, 6);
INSERT INTO roles_permissions (role_id, permission_id) VALUES (1, 7);
INSERT INTO roles_permissions (role_id, permission_id) VALUES (1, 8);

-- user = 2
INSERT INTO roles_permissions (role_id, permission_id) VALUES (2, 2);
INSERT INTO roles_permissions (role_id, permission_id) VALUES (2, 3);
INSERT INTO roles_permissions (role_id, permission_id) VALUES (2, 5);
INSERT INTO roles_permissions (role_id, permission_id) VALUES (2, 6);
INSERT INTO roles_permissions (role_id, permission_id) VALUES (2, 7);

-- guest = 3
INSERT INTO roles_permissions (role_id, permission_id) VALUES (3, 3);
INSERT INTO roles_permissions (role_id, permission_id) VALUES (3, 6);

INSERT INTO migrations (name) VALUES ('roles_and_permissions_2');

