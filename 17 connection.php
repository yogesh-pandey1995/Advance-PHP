<?php

$servername = "localhost";
$username = "root";
$password = "";


$connection = mysqli_connect($servername, $username, $password);

if (!$connection) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
echo "Connected Successfully <hr>"; 