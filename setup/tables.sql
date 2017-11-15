CREATE DATABASE clothesline
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci
;

USE clothesline;

CREATE TABLE user (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    street VARCHAR(50),
    city VARCHAR(50),
    state CHAR(2),
    zip CHAR(5),
    instructions varchar(1000),
    password VARCHAR(50) NOT NULL,
    admin INTEGER(1) DEFAULT 0 NOT NULL,
    created DATETIME NOT NULL,
    INDEX (email)
);

INSERT INTO user (first_name, last_name, email, password, admin, created) VALUES ('Admin', 'User', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', NOW());

CREATE TABLE category (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150)
);

 INSERT INTO category (name) VALUES('Women');
 INSERT INTO category (name) VALUES('Men');
 INSERT INTO category (name) VALUES('Children');

CREATE TABLE package (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    current_status CHAR(1),
    created DATETIME NOT NULL
);

CREATE TABLE user_category (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    user_id INTEGER NOT NULL,
    category_id INTEGER NOT NULL,
    position INTEGER,
    FOREIGN KEY (user_id) REFERENCES user (id),
    FOREIGN KEY (category_id) REFERENCES category (id)
);

CREATE TABLE user_package (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    user_id INTEGER NOT NULL,
    package_id INTEGER NOT NULL,
    received INTEGER,
    FOREIGN KEY (user_id) REFERENCES user (id),
    FOREIGN KEY (package_id) REFERENCES package (id)
);

CREATE TABLE package_category (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    package_id INTEGER NOT NULL,
    category_id INTEGER NOT NULL,
    FOREIGN KEY (package_id) REFERENCES package (id),
    FOREIGN KEY (category_id) REFERENCES category (id)
);

CREATE TABLE session (
    session_id VARCHAR(255) PRIMARY KEY,
    last_update DATETIME,
    session_data TEXT
);

CREATE USER 'clothesline'@'%' IDENTIFIED BY 'Cl4th2s';
GRANT ALL PRIVILEGES ON clothesline.* TO 'clothesline'@'%' WITH GRANT OPTION;
