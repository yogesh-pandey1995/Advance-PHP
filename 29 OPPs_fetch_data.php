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

$query = "SELECT * FROM student_data";
$result = $connection->query($query);
//$data_fetch = $result->fetch_assoc();
if ($result->num_rows > 0) : ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>STUDENT NAME</th>
            <th>ROLL NO</th>
        </tr>
        <?php while ($data_fetch = $result->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $data_fetch['id'] ?></td>
                <td><?php echo $data_fetch['stu_name'] ?></td>
                <td><?php echo $data_fetch['roll_no'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php
else :
    echo "No Result Found";
endif;
