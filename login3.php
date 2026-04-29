<?php
session_start();
include("db.php");

$emailCookie = $_COOKIE['user_email'] ?? "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;

        setcookie("user_email", $email, time()+604800);
        setcookie("last_login", date("Y-m-d H:i:s"), time()+604800);

        header("Location: dashboard3.php");
        exit();
    } else {
        $error = "Invalid login!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body { background:#eef2f7; font-family: Arial; }
.box {
    width:450px; margin:auto; margin-top:100px;
    background:white; padding:20px;
    border-radius:10px; box-shadow:0 0 10px #bbb;
}
input { width:90%; padding:10px; margin:10px 0; }
button { width:90%; padding:10px; background:#007bff; color:white; border:none; }
.error { color:red; }
</style>
</head>
<body>

<div class="box">
<h2>Login</h2>

<?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

<form method="POST">
<input type="email" name="email" placeholder="Email" value="<?php echo $emailCookie; ?>" required>
<input type="password" name="password" placeholder="Password" required>
<button>Login</button>
</form>

<p>No account? <a href="register.php">Register</a></p>
</div>

</body>
</html>