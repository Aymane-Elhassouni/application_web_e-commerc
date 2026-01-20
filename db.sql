CREATE DATABASE gestionOrders;
USE gestionOrders;
CREATE TABLE users(
	id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(150) UNIQUE,
    password VARCHAR(255) NOT NULL
)ENGINE = InnoDB;

CREATE TABLE clients(
	id INT PRIMARY KEY AUTO_INCREMENT,
    FOREIGN KEY (id) REFERENCES users(id)
)ENGINE = InnoDB;

CREATE TABLE admin(
	id INT PRIMARY KEY AUTO_INCREMENT,
    FOREIGN KEY (id) REFERENCES users(id)
)ENGINE = InnoDB;

CREATE TABLE category(
	id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL
)ENGINE = InnoDB;

CREATE TABLE products(
	id INT PRIMARY KEY AUTO_INCREMENT,
    image VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    quantite INT NOT NULL,
    prix DECIMAL(10,2) NOT NULL,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES category(id)
)ENGINE = InnoDB;

CREATE TABLE orders(
	id INT PRIMARY KEY AUTO_INCREMENT,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    client_id INT,
    FOREIGN KEY (client_id) REFERENCES clients(id)
)ENGINE = InnoDB;

CREATE TABLE orderitems(
	id INT PRIMARY KEY AUTO_INCREMENT,
    product_id INT,
    order_id INT,
    prix_total DECIMAL(10,2) NOT NULL,
    quantite INT NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (order_id) REFERENCES orders(id)
)ENGINE = InnoDB;

