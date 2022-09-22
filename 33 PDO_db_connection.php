<?php

$servername = "localhost";
$username = "root";
$password = "";



try {
    $connection = new PDO("mysql:host=$servername;", "$username", "$password");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
    $connection->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
    echo "Connected Successful";
} catch (PDOException $e) {
    die("Unable To Connect Database " . $e->getMessage());
}

