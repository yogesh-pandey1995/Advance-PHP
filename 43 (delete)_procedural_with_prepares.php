<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "school";


$connection = mysqli_connect($servername, $username, $password, $db_name);

if (!$connection) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
echo "Connected Successfully <hr>";

$query = "DELETE FROM student WHERE id=?";

### Prepared Statement
$result = mysqli_prepare($connection, $query);
if ($result) {
    ### Bind Variables To Prepare Statement as Parameters
    mysqli_stmt_bind_param($result, 'i', $id);

    $id = 10;


    mysqli_stmt_execute($result);

    echo mysqli_stmt_affected_rows($result) . " Row Deleted";
} else {
    echo "Unable To Delete Row";
}
