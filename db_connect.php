<?php
$servername = "localhost";
$username = "root";
$password = "23217839";
$dbname = "student_lab_crud";


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
