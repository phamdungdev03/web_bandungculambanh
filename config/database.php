<?php
if (!function_exists('getConnection')) {
    function getConnection()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "qldclb";
        $host = 3366;
        $conn = new mysqli($servername, $username, $password, $dbname, $host);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
}
