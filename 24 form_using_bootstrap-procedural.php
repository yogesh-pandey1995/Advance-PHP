<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "employee";


$connection = mysqli_connect($servername, $username, $password, $db_name);

if (!$connection) {
    die("Database Connection Failed: " . mysqli_connect_error());
}


if (isset($_REQUEST['submit'])) {
    // ##### Validation #####
    if (($_REQUEST['employee_name'] == "") || ($_REQUEST['employee_position'] == "") || ($_REQUEST['employee_salary'] == "")) {
        echo "Required All Filds";
    } else {
        // ##### Insert Data #####
        $emp_name = $_REQUEST['employee_name'];
        $emp_position = $_REQUEST['employee_position'];
        $emp_salary = $_REQUEST['employee_salary'];

        $query = "INSERT INTO emp_data (emp_name, position, salary) VALUES ('$emp_name', '$emp_position', '$emp_salary')";
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo "New Data Inserted Successful";
        } else {
            echo "Unable to Insert Data";
        }
    }
}

// ##### Delete Data #####
if (isset($_REQUEST['delete'])) {

    $delete_query = "DELETE FROM emp_data WHERE id = {$_REQUEST['delete_id']}";
    $delete_result = mysqli_query($connection, $delete_query);

    if ($delete_result) {
        echo "Record Deleted";
    } else {
        echo "Unable to Delete Record";
    }
}

// ##### Edit Data #####
if (isset($_REQUEST['edit'])) {
    $edit_query = "SELECT * FROM emp_data WHERE id= {$_REQUEST['edit_id']}";
    $edit_result = mysqli_query($connection, $edit_query);
    $edit_data_fatch = mysqli_fetch_assoc($edit_result);
    
}

if (isset($_REQUEST['update'])) {
    if (($_REQUEST['employee_name'] == "") || ($_REQUEST['employee_position'] == "") || ($_REQUEST['employee_salary'] == "")) {
        echo "Required All Filds";
    } else {
        $edit_emp_name = $_REQUEST['employee_name'];
        $edit_emp_position = $_REQUEST['employee_position'];
        $edit_emp_salary = $_REQUEST['employee_salary'];
        
        $update_query = "UPDATE emp_data SET emp_name = '$edit_emp_name', position = '$edit_emp_position', salary = '$edit_emp_salary' WHERE id = {$_REQUEST['update_id']}";
        $update_result = mysqli_query($connection, $update_query);

        if ($update_result) {
            echo "Update Successful";
        } else {
            echo "Unable to Update Data";
        }
    }
}

// ##### Fatch All Data From Database #####
$query_fetch = "SELECT * FROM emp_data";
$result_fetch = mysqli_query($connection, $query_fetch);
//$data_store = mysqli_fetch_assoc($result);

mysqli_close($connection);
?>

<!doctype html>
<html lang="en">

<head>
    <title>INSERT DATA</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/f51b3fd0b6.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 p-4">

                <form action="" method="POST">
                    <div class="row mb-3">
                        <label for="emp_name" class="col-sm-3 col-form-label">Employee Name :</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control emp_name" id="emp_name" name="employee_name" value="<?php if (isset($edit_data_fatch['emp_name'])) { echo $edit_data_fatch['emp_name']; } ?>" placeholder="Employee Name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="position" class="col-sm-3 col-form-label">Position :</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control position" id="position" name="employee_position" value="<?php if (isset($edit_data_fatch['position'])) { echo $edit_data_fatch['position']; } ?>" placeholder="Position">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="salary" class="col-sm-3 col-form-label">Salary :</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control salary" id="salary" name="employee_salary" value="<?php if (isset($edit_data_fatch['salary'])) { echo $edit_data_fatch['salary']; } ?>" placeholder="Salary">
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <button type="Submit" class="btn btn-outline-success btn-lg" name="submit">SUBMIT</button>

                            <input type="hidden" name="update_id" value="<?php if (isset($edit_data_fatch['id'])) { echo $edit_data_fatch['id']; } ?>">
                            <button type="Submit" class="btn btn-outline-info btn-lg" name="update">UPDATE</button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-md-6 p-4">

                <?php if (mysqli_num_rows($result_fetch) > 0) : ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>EMP NAME</th>
                                <th>POSITION</th>
                                <th>SALARY</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data_store = mysqli_fetch_assoc($result_fetch)) : ?>
                                <tr>
                                    <td><?php echo $data_store['id'] ?></td>
                                    <td><?php echo $data_store['emp_name'] ?></td>
                                    <td><?php echo $data_store['position'] ?></td>
                                    <td><?php echo $data_store['salary'] ?></td>
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
                            <?php endwhile; ?>
                        </tbody>
                    <?php
                else : echo "No Result Found";
                endif; ?>
                    </table>
            </div>

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>