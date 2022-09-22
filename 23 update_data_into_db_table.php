<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "employee";

$connection = mysqli_connect($servername, $username, $password, $db_name);

if (!$connection) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

$query = "UPDATE emp_data SET emp_name ='Dummy Data', position = 'Extra', salary = '123' WHERE id = 8";
$result = mysqli_query($connection, $query);

if ($result) {
    echo "Record Updated";
} else {
    echo "Unable to Update Record";
}

mysqli_close($connection);