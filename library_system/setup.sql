
CREATE DATABASE IF NOT EXISTS university_library;

USE university_library;

CREATE TABLE IF NOT EXISTS books (
    id        INT AUTO_INCREMENT PRIMARY KEY,  
    title     VARCHAR(255) NOT NULL,           
    author    VARCHAR(255) NOT NULL,           
    category  VARCHAR(100) NOT NULL,           
    status    ENUM('Available', 'Not Available') NOT NULL DEFAULT 'Available', 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
);

INSERT INTO books (title, author, category, status) VALUES
('Introduction to Algorithms', 'Thomas Cormen', 'Computer Science', 'Available'),
('Clean Code', 'Robert C. Martin', 'Software Engineering', 'Available'),
('The Great Gatsby', 'F. Scott Fitzgerald', 'Literature', 'Not Available'),
('Calculus: Early Transcendentals', 'James Stewart', 'Mathematics', 'Available'),
('Organic Chemistry', 'Paula Bruice', 'Chemistry', 'Not Available');
