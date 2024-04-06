<?php 

    $hostname = "localhost";
    $username = "root";
    $password = "your password";
    $database = "your database";

    $conn = mysqli_connect($hostname, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error de conexión" . $conn->connect_error);
    }
?>