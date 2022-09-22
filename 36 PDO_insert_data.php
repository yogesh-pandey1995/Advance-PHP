<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "school";

try {
    $connection = new PDO("mysql:host=$servername; dbname=$db_name", "$username", "$password");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
    $connection->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
    echo "Connected Successful <hr>";
} catch (PDOException $e) {
    die("Unable To Connect Database " . $e->getMessage());
}

$query = "INSERT INTO student (name, roll_no, class) VALUES ('Shivansh', '106', '11')";
$result = $connection->exec($query);

if($result){
    echo "Insert Data Successful <br>";
    echo $result . " Number Of Rows";
}