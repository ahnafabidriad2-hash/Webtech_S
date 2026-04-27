<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login1.php");
    exit();
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .dashboard-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>

    <div class="dashboard-container">
        <h2>Welcome <?php echo $user; ?></h2>
        <p>You are logged in using session.</p>
        <a href="logout1.php">Logout</a>
    </div>

</body>
</html>