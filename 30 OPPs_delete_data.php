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

$query = "DELETE FROM student_data WHERE id=7";
$result = $connection->query($query);

if ($result) {
    echo "Record Delete Successful";
} else {
    echo "Unable To Delete Data";
}
