<?php
$host = "localhost";
$user = "root";
$password = "";
$dbName = "auth_system";

// Create connection (without DB first)
$conn = new mysqli($host, $user, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbName";
if ($conn->query($sql) === TRUE) {
    // echo "Database ready<br>";
} else {
    die("Error creating database: " . $conn->error);
}

// Select database
$conn->select_db($dbName);

$createTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    gender ENUM('Male','Female','Other'),
    dob DATE,
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
    // echo "Table ready<br>";
} else {
    die("Error creating table: " . $conn->error);
}
?>