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

    ##### INSERT DATA #####
    if (isset($_REQUEST['submit'])) {
        if (($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_roll_no'] == "") || ($_REQUEST['stu_class'] == "")) {
            echo "All Fields Are Required";
        } else {
            $stu_name = $_REQUEST['stu_name'];
            $stu_roll = $_REQUEST['stu_roll_no'];
            $stu_class = $_REQUEST['stu_class'];

            $insert_query = "INSERT INTO student (name, roll_no, class) VALUES ('$stu_name', '$stu_roll', '$stu_class')";
            $insert_result = $connection->exec($insert_query);

            if ($insert_result) {
                echo "Insert Data Successful";
            } else {
                echo "Unable To Insert Data";
            }
        }
    }

    ##### DELETE DATA #####
    if (isset($_REQUEST['delete'])) {
        $delete_query = "DELETE FROM student WHERE id={$_REQUEST['delete_id']}";
        $delete_result = $connection->exec($delete_query);

        if ($delete_result) {
            echo "Delete Data Successful <br>";
        } else {
            echo "Unable To Delete Data";
        }
    }

    ##### UPDATE DATA #####
    if (isset($_REQUEST['edit'])) {
        $edit_query = "SELECT * FROM student WHERE id = {$_REQUEST['edit_id']}";
        $edit_result = $connection->query($edit_query);
        $edit_fetch = $edit_result->fetch(PDO::FETCH_ASSOC);
    }

    if (isset($_REQUEST['update'])) {
        if (($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_roll_no'] == "") || ($_REQUEST['stu_class'] == "")) {
            echo "All Fields Are Required";
        } else {
            $s_name = $_REQUEST['stu_name'];
            $s_roll = $_REQUEST['stu_roll_no'];
            $s_class = $_REQUEST['stu_class'];

            $query = "UPDATE student SET name = '$s_name', roll_no = '$s_roll', class = '$s_class' WHERE id={$_REQUEST['update_id']}";
            $result = $connection->exec($query);

            if ($result) {
                echo "Update Data Successful <br>";
                echo $result . " Number Of Rows";
            } else {
                echo "Unable To Update Data";
            }
        }
    }

    ##### FETCH DATA #####
    $query = "SELECT * FROM student";
    $result = $connection->query($query);
    
} catch (PDOException $e) {
    die("ERROR " . $e->getMessage());
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>FORM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="stu-name" class="form-label">STUDENT NAME</label>
                        <input type="text" class="form-control" id="stu-name" name="stu_name" placeholder="Enter Student Name" value="<?php if (isset($edit_fetch['name'])) { echo $edit_fetch['name']; } ?>">
                    </div>
                    <div class="mb-3">
                        <label for="stu-roll-no" class="form-label">STUDENT ROLL NO</label>
                        <input type="text" class="form-control" id="stu-roll-no" name="stu_roll_no" placeholder="Enter Student Roll No" value="<?php if (isset($edit_fetch['roll_no'])) { echo $edit_fetch['roll_no']; } ?>">
                    </div>
                    <div class="mb-3">
                        <label for="stu-class" class="form-label">STUDENT CLASS</label>
                        <input type="text" class="form-control" id="stu-class" name="stu_class" placeholder="Enter Student Class" value="<?php if (isset($edit_fetch['class'])) {  echo $edit_fetch['class']; } ?>">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg" name="submit">Submit</button>
                    <input type="hidden" name="update_id" value="<?php if (isset($edit_fetch['id'])) { echo $edit_fetch['id']; } ?>">
                    <button type="submit" class="btn btn-success btn-lg" name="update">Update</button>
                </form>
            </div>
            <div class="col-md-6">
                <?php if ($result->rowCount() > 0) : ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">NAME</th>
                                <th scope="col">ROLL NO</th>
                                <th scope="col">CLASS</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $data_store) : ?>
                                <tr>
                                    <td><?php echo $data_store['id'] ?></td>
                                    <td><?php echo $data_store['name'] ?></td>
                                    <td><?php echo $data_store['roll_no'] ?></td>
                                    <td><?php echo $data_store['class'] ?></td>
                                    <td>
                                        <form action="" method="POST">
                                            <input type="hidden" name="delete_id" value="<?php echo $data_store['id'] ?>">
                                            <button type="submit" class="btn btn-outline-danger btn-sm" name="delete">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                            <input type="hidden" name="edit_id" value="<?php echo $data_store['id'] ?>">
                                            <button type="submit" class="btn btn-outline-primary btn-sm" name="edit">
                                                <i class="fa-solid fa-pen-clip"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php
                else :
                    echo "No Result Found";
                endif; ?>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/f51b3fd0b6.js" crossorigin="anonymous"></script>
</body>

</html>