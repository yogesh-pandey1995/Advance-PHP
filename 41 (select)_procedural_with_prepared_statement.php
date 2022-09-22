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

$query = "SELECT * FROM student";
// $query = "SELECT * FROM student WHERE id = ?";

### Prepared Statement
$result = mysqli_prepare($connection, $query);

### Bind Parameter
// mysqli_stmt_bind_param($result, 'i', $id);
// $id = 3;

### Bind Result Set In Variables
mysqli_stmt_bind_result($result, $id, $name, $roll_no, $class);
### Execute Prepared Statement
mysqli_stmt_execute($result);
### Fetch Single Row Data

?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>ROLL NO</th>
        <th>CLASS</th>
    </tr>
    <?php while (mysqli_stmt_fetch($result)) : ?> <!--- Fetch Single Row Date --->
        <tr>
            <td><?php echo $id ?></td>
            <td><?php echo $name ?></td>
            <td><?php echo $roll_no ?></td>
            <td><?php echo $class ?></td>
        </tr>
    <?php endwhile; ?>
</table>
<?php

### Store Results
mysqli_stmt_store_result($result);

### Numbers Of Rows
$rows = mysqli_stmt_num_rows($result);
echo "Number Of Rows " . $rows;

### Free Results
mysqli_stmt_free_result($result);

### Close Prepared Statement
mysqli_stmt_close($result);

### Close Connection
mysqli_close($connection);