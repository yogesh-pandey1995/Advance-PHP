<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "employee";

$connection = mysqli_connect($servername, $username, $password, $db_name);

if (!$connection) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

$query = "CREATE TABLE emp_data (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    emp_name VARCHAR(30) NOT NULL,
    position VARCHAR(30) NOT NULL,
    salary int(10)
    )";
$result = mysqli_query($connection, $query);

if ($result) {
    echo "Database Create Successful";
} else {
    die("ERROR Database Not Created");
}

mysqli_close($connection);