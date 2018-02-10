<?php
    die();
?>

CREATE DATABASE clothesline
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci
;

USE clothesline;

CREATE TABLE user (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    street VARCHAR(50),
    city VARCHAR(50),
    state CHAR(2),
    zip CHAR(5),
    instructions VARCHAR(1000),
    referral VARCHAR(1000),
    notes VARCHAR(2000),
    subscription INTEGER(1) DEFAULT 0 NOT NULL,
    admin INTEGER(1) DEFAULT 0 NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    INDEX (email)
);

INSERT INTO user (first_name, email, admin, created_at, updated_at) VALUES ('Admin', 'admin@clothesline.org', '1', NOW(), NOW());

CREATE TABLE category (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150),
    icon VARCHAR(50)
);

 INSERT INTO category (name, icon) VALUES('Women', 'female');
 INSERT INTO category (name, icon) VALUES('Men', 'male');
 INSERT INTO category (name, icon) VALUES('Children', 'child');

CREATE TABLE user_category (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    user_id INTEGER NOT NULL,
    category_id INTEGER NOT NULL,
    position INTEGER NOT NULL DEFAULT 0,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user (id),
    FOREIGN KEY (category_id) REFERENCES category (id)
);

CREATE TABLE session (
    session_id VARCHAR(255) PRIMARY KEY,
    session_data TEXT,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL
);

CREATE USER 'clothesline'@'%' IDENTIFIED BY 'Cl4th2s';
GRANT ALL PRIVILEGES ON clothesline.* TO 'clothesline'@'%' WITH GRANT OPTION;
