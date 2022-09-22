<?php

$servername = "localhost";
$username = "root";
$password = "";

$connection = mysqli_connect($servername, $username, $password);

if (!$connection) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

$query = "CREATE DATABASE employee";
$result = mysqli_query($connection, $query);

if ($result) {
    echo "Database Create Successful";
} else {
    die("ERROR Database Not Created");
}

mysqli_close($connection);