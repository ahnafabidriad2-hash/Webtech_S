<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];

    $sql = "INSERT INTO users (name,email,password,phone,gender,dob,address)
            VALUES ('$name','$email','$password','$phone','$gender','$dob','$address')";

    if ($conn->query($sql)) {
        header("Location: login3.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<style>
body { font-family: Arial; background: #f4f6f9; }
.container {
    width: 450px; margin: auto; background: white;
    padding: 20px; margin-top: 50px;
    border-radius: 10px; box-shadow: 0 0 10px #ccc;
}
input, select, textarea {
    width: 90%; padding: 10px; margin: 8px 0;
}
button {
    background: #28a745; color: white;
    padding: 10px; border: none; width: 100%;
}
</style>
</head>
<body>

<div class="container">
<h2>Create Account</h2>
<form method="POST">
<input type="text" name="name" placeholder="Full Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>

<input type="text" name="phone" placeholder="Phone">

<select name="gender">
<option value="">Select Gender</option>
<option>Male</option>
<option>Female</option>
<option>Other</option>
</select>

<input type="date" name="dob">

<textarea name="address" placeholder="Address"></textarea>

<button type="submit">Register</button>
</form>

<p>Already have an account? <a href="login3.php">Login</a></p>
</div>

</body>
</html>