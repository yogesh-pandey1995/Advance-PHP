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

try {
    $query = "DELETE FROM student WHERE id=7";
    $result = $connection->exec($query);

    if ($result) {
        echo "Delete Data Successful <br>";
        echo $result . " Number Of Rows";
    }
} catch (PDOException $e) {
    die("ERROR " . $e->getMessage());
}
