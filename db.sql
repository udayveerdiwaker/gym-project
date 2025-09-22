-- Gym Management System Database
CREATE DATABASE IF NOT EXISTS gym_management;
USE gym_management;

-- ======================
-- Admin Table
-- ======================
-- CREATE TABLE IF NOT EXISTS admin (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(100) NOT NULL,
--     email VARCHAR(100) NOT NULL UNIQUE,
--     password VARCHAR(255) NOT NULL,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );

-- INSERT INTO admin (name, email, password) VALUES
-- ('Admin', 'admin@gym.com', MD5('admin123'));

-- ======================
-- Users Table
-- ======================
-- CREATE TABLE IF NOT EXISTS users (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(100) NOT NULL,
--     email VARCHAR(100) NOT NULL UNIQUE,
--     password VARCHAR(255) NOT NULL,
--     role ENUM('user','admin') DEFAULT 'user',
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );

-- INSERT INTO users (name, email, password, role) VALUES
-- ('Sample User', 'user@gym.com', MD5('user123'), 'user');



CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- User table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert default admin (password = admin123)
INSERT INTO admins (username, password) 
VALUES ('admin', '$2y$10$2hdGHcZbUIV0jU/b6QUfEOd5fUMPE7HgX9ssM/ApBMtPUp1z7w3rS');

-- Insert default user (password = user123)
INSERT INTO users (username, password) 
VALUES ('user', '$2y$10$SKzUMvS9lfcdwMG/kGu4zOzXKgQz3/lffSd8OhnoCCPbxIh3BhN9S');

-- ======================
-- Members Table
-- ======================
CREATE TABLE IF NOT EXISTS members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    plan_id INT,
    join_date DATE,
    status ENUM('active','inactive') DEFAULT 'active'
);

-- ======================
-- Trainers Table
-- ======================
CREATE TABLE IF NOT EXISTS trainers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    phone VARCHAR(20),
    specialty VARCHAR(100)
);

-- ======================
-- Plans Table
-- ======================
CREATE TABLE IF NOT EXISTS plans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    duration INT NOT NULL COMMENT 'Duration in months',
    price DECIMAL(10,2) NOT NULL
);

INSERT INTO plans (name, duration, price) VALUES
('Basic Plan', 1, 1000.00),
('Standard Plan', 3, 2500.00),
('Premium Plan', 6, 4500.00);

-- ======================
-- Payments Table
-- ======================
CREATE TABLE IF NOT EXISTS payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member_id INT NOT NULL,
    plan_id INT NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    payment_date DATE NOT NULL,
    status ENUM('paid','pending') DEFAULT 'paid',
    FOREIGN KEY (member_id) REFERENCES members(id),
    FOREIGN KEY (plan_id) REFERENCES plans(id)
);

-- ======================
-- Attendance Table
-- ======================
CREATE TABLE IF NOT EXISTS attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member_id INT NOT NULL,
    attendance_date DATE NOT NULL,
    status ENUM('present','absent') DEFAULT 'present',
    FOREIGN KEY (member_id) REFERENCES members(id)
);

