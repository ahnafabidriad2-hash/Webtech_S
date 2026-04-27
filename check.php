<?php
session_start();


if (empty($_POST['username']) || empty($_POST['password'])) {
    echo "Please fill in both fields.";
    exit();
}
$username = $_POST['username'];
$password = $_POST['password'];

$stored_username = "admin";
$stored_password_hash = password_hash("1234", PASSWORD_DEFAULT); 

if ($username == $stored_username && password_verify($password, $stored_password_hash)) {
    $_SESSION['user'] = $username;
    header("Location: dashboard1.php");
    exit();
} else {
    echo "Invalid Username or Password";
}
?>