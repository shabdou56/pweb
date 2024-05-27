CREATE DATABASE todolist;
use todolist;

-- Create the 'users' table first because other tables depend on it.
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(25) NOT NULL,
    password VARCHAR(255) NOT NULL  -- Store hashed passwords, never plain text
);

-- Create the 'cat' table next as it depends on 'users' but is referenced by 'tasks'.
CREATE TABLE cat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20) NOT NULL,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Finally, create the 'tasks' table which references both 'users' and 'cat'.
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(100) NOT NULL,
    etat INT DEFAULT 0,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT,
    cat_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (cat_id) REFERENCES cat(id)
);
