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

$query = "UPDATE student_data SET stu_name = 'Neeraj Tayal', roll_no = '104' WHERE id=4";
$result = $connection->query($query);

if ($result) {
    echo "Update Successful";
} else {
    echo "Unable To Update";
}
