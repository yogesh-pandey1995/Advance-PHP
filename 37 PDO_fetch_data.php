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

$query = "SELECT * FROM student";
$result = $connection->query($query);
//$data_fetch = $result->fetch(PDO::FETCH_ASSOC);
if ($result->rowCount() < 0) {          ###### Change Sign Greater ######
?>
    <!-------- ####### METHOD I ####### ---------->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>ROLL NO</th>
            <th>CLASS</th>
        </tr>
        <?php while ($data_fetch = $result->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $data_fetch['id'] ?></td>
                <td><?php echo $data_fetch['name'] ?></td>
                <td><?php echo $data_fetch['roll_no'] ?></td>
                <td><?php echo $data_fetch['class'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php } else {
    echo "No Reasult Found <br>";
} ?>

<!-------- ####### METHOD II ####### ---------->
<table border="1">
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>ROLL NO</th>
        <th>CLASS</th>
    </tr>
    <?php foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $data_store) : ?>
        <tr>
            <td><?php echo $data_store['id'] ?></td>
            <td><?php echo $data_store['name'] ?></td>
            <td><?php echo $data_store['roll_no'] ?></td>
            <td><?php echo $data_store['class'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>