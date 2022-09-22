<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "employee";

$connection = mysqli_connect($servername, $username, $password, $db_name);

if (!$connection) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

$query = "DELETE FROM emp_data WHERE id = 6";
$result = mysqli_query($connection, $query);

if ($result) {
    echo "Record Deleted";
} else {
    echo "Unable to Delete Record";
}

mysqli_close($connection);