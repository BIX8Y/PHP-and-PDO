CREATE DATABASE IF NOT EXISTS library;
USE library;
CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    author VARCHAR(255),
    published_year YEAR,
    genre VARCHAR(100)
);
CREATE DATABASE IF NOT EXISTS school;
USE school;
CREATE TABLE IF NOT EXISTS attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(255),
    date DATE,
    status ENUM('Present', 'Absent', 'Late')
);
CREATE DATABASE IF NOT EXISTS video_store;
USE video_store;
CREATE TABLE IF NOT EXISTS movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    director VARCHAR(255),
    release_year YEAR,
    available BOOLEAN
);
CREATE DATABASE IF NOT EXISTS company_db;
USE company_db;
CREATE TABLE IF NOT EXISTS timelogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_name VARCHAR(255),
    log_date DATE,
    log_time TIME,
    type ENUM('IN', 'OUT')
);