<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "test";



try {
    $connection = new PDO("mysql:host=$servername; dbname=$db_name", "$username", "$password");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
    $connection->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
    echo "Connected Successful <hr>";
} catch (PDOException $e) {
    die("Unable To Connect Database " . $e->getMessage());
}

$query = "CREATE TABLE student_data(id INT(6) AUTO_INCREMENT PRIMARY KEY,
    stu_name VARCHAR(30),
    roll_no INT(5)
    )";
$result = $connection->query($query);

if ($result) {
    echo "Database Create Successful";
}
