<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "employee";

$connection = mysqli_connect($servername, $username, $password, $db_name);

if (!$connection) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM emp_data";
$result = mysqli_query($connection, $query);
//$data_store = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) > 0) : ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>EMP NAME</th>
            <th>POSITION</th>
            <th>SALARY</th>
        </tr>
        <?php while ($data_store = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $data_store['id'] ?></td>
                <td><?php echo $data_store['emp_name'] ?></td>
                <td><?php echo $data_store['position'] ?></td>
                <td><?php echo $data_store['salary'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else : echo "No Result Found";
endif; 

mysqli_close($connection);
?>