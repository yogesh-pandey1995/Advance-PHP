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
    $query = "UPDATE student SET name = 'Shivansh', roll_no = '102', class = '11' WHERE id=2";
    $result = $connection->exec($query);

    if ($result) {
        echo "Update Data Successful <br>";
        echo $result . " Number Of Rows";
    } else {
        echo "Unable To Update Data";
    }
} catch (PDOException $e) {
    die("ERROR " . $e->getMessage());
}
