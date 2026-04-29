<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login3.php");
    exit();
}

$user = $_SESSION['user'];
$lastLogin = $_COOKIE['last_login'] ?? "First login";
?>

<!DOCTYPE html>
<html>
<head>
<style>
body { font-family: Arial; background:#f4f6f9; }
.card {
    width:500px; margin:auto; margin-top:50px;
    background:white; padding:20px;
    border-radius:10px; box-shadow:0 0 10px #ccc;
}
h2 { color:#333; }
p { margin:5px 0; }
.logout {
    display:inline-block; margin-top:15px;
    padding:10px; background:red; color:white;
    text-decoration:none;
}
</style>
</head>
<body>

<div class="card">
<h2>Welcome, <?php echo $user['name']; ?> 👋</h2>

<p><b>Email:</b> <?php echo $user['email']; ?></p>
<p><b>Phone:</b> <?php echo $user['phone']; ?></p>
<p><b>Gender:</b> <?php echo $user['gender']; ?></p>
<p><b>Date of Birth:</b> <?php echo $user['dob']; ?></p>
<p><b>Address:</b> <?php echo $user['address']; ?></p>

<hr>
<p><b>Last Login:</b> <?php echo $lastLogin; ?></p>

<a class="logout" href="logout.php">Logout</a>
</div>

</body>
</html>