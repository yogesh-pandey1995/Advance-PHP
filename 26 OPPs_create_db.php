<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create Connection
$connection = new mysqli("$servername", "$username", "$password");

// Checking Connection
if ($connection->connect_error) {
    die("Database Connection Failed");
}
echo "Connect Successful <hr>";

// Create Database
$query = "CREATE DATABASE student";

if ($connection->query($query) === TRUE) {
    echo "Database Created Sucessful";
} else {
    echo "Connection Failed";
}
$connection->close();