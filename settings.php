<?php
    // Replace the placeholders with your database credentials
    $servername = "feenix-mariadb.swin.edu.au";
    $username = "s104053930";
    $password = "030303";
    $dbname = "s104053930_db";

    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>

