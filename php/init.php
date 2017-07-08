<?php

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lms";

    // Create connection
    $conn = new mysqli($hostname, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


//    echo "Connected sufccessfully<br>";

?>
