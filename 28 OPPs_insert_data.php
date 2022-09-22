<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "student";

// Create Connection
$connection = new mysqli("$servername", "$username", "$password", $db_name);

// Checking Connection
if ($connection->connect_error) {
    die("Database Connection Failed");
}
echo "Database Connect Successful <hr>";

$query = "INSERT INTO student_data (stu_name, roll_no) VALUES ('Deepak Rao', '105')";
$result = $connection->query($query);

if($result){
    echo "Record Added Successful";
}else{
    echo "Unable To Add Data";
}
$connection->close();