<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "student";

$connection = new mysqli("$servername", "$username", "$password", $db_name);

if ($connection->connect_error) {
    die("Database Connection Failed");
}
echo "Database Connect Successful <hr>";


##### INSERT DATA #####
if (isset($_REQUEST['submit'])) {
    if (($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_roll_no'] == "")) {
        echo "Required All Filds";
    } else {
        $student_name = $_REQUEST['stu_name'];
        $student_roll_no = $_REQUEST['stu_roll_no'];

        $insert_query = "INSERT INTO student_data (stu_name, roll_no) VALUES ('$student_name', '$student_roll_no')";
        $insert_result = $connection->query($insert_query);

        if ($insert_result) {
            echo "Record Added Successful";
        } else {
            echo "Unable To Add Data";
        }
    }
}

##### DELETE DATA #####
if (isset($_REQUEST['delete'])) {
    $delete_query = "DELETE FROM student_data WHERE id= {$_REQUEST['delete_id']}";
    $delete_result = $connection->query($delete_query);

    if ($delete_result) {
        echo "Record Delete Successful";
    } else {
        echo "Unable To Delete Data";
    }
}

##### UPDATE DATA #####
if (isset($_REQUEST['edit'])) {
    $edit_query = "SELECT * FROM student_data WHERE id = {$_REQUEST['edit_id']}";
    $edit_result = $connection->query($edit_query);
    $edit_fetch = $edit_result->fetch_assoc();
}
if (isset($_REQUEST['update'])) {
    if (($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_roll_no'] == "")) {
        echo "Required All Filds";
    } else {
        $stud_name = $_REQUEST['stu_name'];
        $stud_roll = $_REQUEST['stu_roll_no'];

        $query = "UPDATE student_data SET stu_name = '$stud_name', roll_no = '$stud_roll' WHERE id={$_REQUEST['update_id']}";
        $result = $connection->query($query);

        if ($result) {
            echo "Update Successful";
        } else {
            echo "Unable To Update";
        }
    }
}

##### FATCH DATA #####
$query = "SELECT * FROM student_data";
$result = $connection->query($query);

$connection->close();
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
                        <input type="text" class="form-control" id="stu-name" name="stu_name" placeholder="Enter Student Name" value="<?php if (isset($edit_fetch['stu_name'])) { echo $edit_fetch['stu_name']; } ?>">
                    </div>
                    <div class="mb-3">
                        <label for="stu-roll-no" class="form-label">STUDENT ROLL NO</label>
                        <input type="text" class="form-control" id="stu-roll-no" name="stu_roll_no" placeholder="Enter Student Roll No" value="<?php if (isset($edit_fetch['roll_no'])) { echo $edit_fetch['roll_no']; } ?>">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg" name="submit">Submit</button>
                    <input type="hidden" name="update_id" value="<?php if (isset($edit_fetch['id'])) { echo $edit_fetch['id']; } ?>">
                    <button type="submit" class="btn btn-success btn-lg" name="update">Update</button>
                </form>
            </div>
            <div class="col-md-6">
                <?php if ($result->num_rows > 0) : ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">STUDENT NAME</th>
                                <th scope="col">ROLL NO</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data_fetch = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $data_fetch['id'] ?></td>
                                    <td><?php echo $data_fetch['stu_name'] ?></td>
                                    <td><?php echo $data_fetch['roll_no'] ?></td>
                                    <td>
                                        <form action="" method="POST">
                                            <input type="hidden" name="delete_id" value="<?php echo $data_fetch['id'] ?>">
                                            <button type="submit" class="btn btn-outline-danger btn-sm" name="delete">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                            <input type="hidden" name="edit_id" value="<?php echo $data_fetch['id'] ?>">
                                            <button type="submit" class="btn btn-outline-primary btn-sm" name="edit">
                                                <i class="fa-solid fa-pen-clip"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
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