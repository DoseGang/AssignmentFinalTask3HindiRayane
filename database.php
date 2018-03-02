<?php

$host="localhost";
$user="root";
$password="";
$database = "h025374h2";
$conn = new mysqli($host, $user, $password, $database);


if($conn->connect_errno > 0){
    die('Unable to connect to database [' . $conn->connect_error . ']');
}
    
?>
