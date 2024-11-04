<?php
function getConnection()
{
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "qldclb";
    $host = 3366;
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
