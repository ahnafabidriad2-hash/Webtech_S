<?php
function connectDatabase() {
    $host     = "localhost";   
    $username = "root";       
    $password = "";           
    $database = "university_library"; 

    $connection = mysqli_connect($host, $username, $password, $database);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $connection;
}
