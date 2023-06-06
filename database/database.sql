CREATE DATABASE car_rental;

USE car_rental;

CREATE TABLE cars (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  brand VARCHAR(255) NOT NULL,
  color VARCHAR(255) NOT NULL,
  price INT NOT NULL,
  status VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO users (Username, Password) VALUES ("admin", "$2y$10$WgL2d2fzi6IiGiTfXvdBluTLlMroU8zBtIcRut7SzOB6j9i/LbA4K");

CREATE TABLE customers (
  id INT NOT NULL AUTO_INCREMENT,
  fullname VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(255) NOT NULL,
  sex VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE transactions (
  id INT NOT NULL AUTO_INCREMENT,
  car_id INT NOT NULL,
  customer_id INT NOT NULL,
  borrow_date DATE NOT NULL,
  return_date DATE NOT NULL,
  total INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (car_id) REFERENCES cars (id),
  FOREIGN KEY (customer_id) REFERENCES customers (id)
);