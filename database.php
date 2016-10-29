<?php

function db_connect() {
    $servername = "localhost";
    $username = "tigosecure";
    $password = "123456";
    $dbname = "tigosecure";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}

function db_close($conn) {
    $conn->close();
}
