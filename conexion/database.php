<?php 

    $hostname = "localhost";
    $username = "root";
    $password = "MSf1Aaw9Qa9967489922";
    $database = "cinema";

    $conn = mysqli_connect($hostname, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error de conexión" . $conn->connect_error);
    }
?>