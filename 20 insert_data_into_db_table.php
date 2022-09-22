<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "employee";

$connection = mysqli_connect($servername, $username, $password, $db_name);

if (!$connection) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

$query = "INSERT INTO emp_data (emp_name, position, salary) VALUES ('Neeraj Tayal', 'Video Editer', '11000')";
$result = mysqli_query($connection, $query);

if($result){
    echo "New Data Inserted Successful";
}else{
    echo "Unable to Insert Data";
}

mysqli_close($connection);
