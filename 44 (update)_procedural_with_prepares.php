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

$query = "UPDATE student SET name = ?, roll_no = ?, class = ? WHERE id =?";
$result = mysqli_prepare($connection, $query);

if ($result) {

    mysqli_stmt_bind_param($result, 'siii', $s_name, $s_roll, $s_class, $s_id );

    $s_name = "Vikas";
    $s_roll = 110;
    $s_class = 12;
    $s_id = 12;


    mysqli_stmt_execute($result);

    echo mysqli_stmt_affected_rows($result) . " Row Update Sucessful";
} else {
    echo "Unable To Update Row";
}
