<?php
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $db_name = "hotbananas";

    $conn = new mysqli($servername, $username, $pass, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
    }
?>
