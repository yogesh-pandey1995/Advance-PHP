<?php

$servername = "localhost";
$username = "root";
$password = "";


// Create Connection
$connection = new mysqli("$servername", "$username", "$password");
// Checking Connection

if($connection->connect_error){
    die("Database Connection Failed");
}
else{
    echo "Database Connect Successful";
}