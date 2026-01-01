CREATE DATABASE library_db;
USE library_db;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50),
  password VARCHAR(255),
  role ENUM('admin','user')
);

CREATE TABLE books (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100),
  author VARCHAR(100),
  genre VARCHAR(100),
  keywords TEXT,
  available BOOLEAN DEFAULT TRUE
);

CREATE TABLE requests (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  book_id INT,
  status ENUM('Pending','Approved','Rejected') DEFAULT 'Pending'
);

INSERT INTO users (username,password,role) VALUES
('admin','admin123','admin'),
('user1','user123','user');
