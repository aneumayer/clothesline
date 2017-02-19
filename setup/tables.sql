CREATE DATABASE clothesline 
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci
;

USE clothesline;

CREATE TABLE user (
    user_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    street VARCHAR(50) NOT NULL,
    city VARCHAR(50) NOT NULL,
    state CHAR(2) NOT NULL,
    zip CHAR(5) NOT NULL,
    created DATETIME NOT NULL,
    INDEX (email)
);

CREATE TABLE category (
    category_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150)
);

CREATE TABLE package (
    package_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    current_status CHAR(1),
    created DATETIME NOT NULL
);

CREATE TABLE user_category (
    user_id INTEGER NOT NULL,
    category_id INTEGER NOT NULL,
    position INTEGER,
    FOREIGN KEY (user_id) REFERENCES user (user_id),
    FOREIGN KEY (category_id) REFERENCES category (category_id)
);

CREATE TABLE user_package (
    user_id INTEGER NOT NULL,
    package_id INTEGER NOT NULL,
    received INTEGER,
    FOREIGN KEY (user_id) REFERENCES user (user_id),
    FOREIGN KEY (package_id) REFERENCES package (package_id)
);

CREATE TABLE package_category (
    package_id INTEGER NOT NULL,
    category_id INTEGER NOT NULL,
    FOREIGN KEY (package_id) REFERENCES package (package_id),
    FOREIGN KEY (category_id) REFERENCES category (category_id)
);