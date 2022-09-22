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

// Create Database
$query = "CREATE TABLE student_data(id INT(6) AUTO_INCREMENT PRIMARY KEY,
    stu_name VARCHAR(30),
    roll_no INT(5)
    )";

if ($connection->query($query) === TRUE) {
    echo "Table Created Sucessful";
} else {
    echo "Unable To Create";
}
$connection->close();
