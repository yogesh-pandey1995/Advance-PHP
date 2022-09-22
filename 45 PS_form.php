<!doctype html>
<html lang="en">

<head>
    <title>Prepared Statement</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/f51b3fd0b6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>
    <div class="container">
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

        ### Insert Data
        if (isset($_REQUEST['submit'])) {

            if (($_REQUEST['stu_name'] == "") || ($_REQUEST['roll_no'] == "") || ($_REQUEST['stu_class'] == "")) {
                echo "<h4 class='alert alert-danger'>Required All Fields<h4>";
            } else {

                $insert_query = "INSERT INTO student (name, roll_no, class) VALUES (?, ?, ?)";
                $insert_result = mysqli_prepare($connection, $insert_query);
                if ($insert_result) {

                    mysqli_stmt_bind_param($insert_result, 'sii', $s_name, $s_roll_no, $s_class);
                    $s_name = $_REQUEST['stu_name'];
                    $s_roll_no = $_REQUEST['roll_no'];
                    $s_class = $_REQUEST['stu_class'];

                    mysqli_stmt_execute($insert_result);

                    echo "<h4 class='alert alert-success'>" . mysqli_stmt_affected_rows($insert_result) . " Row Inserted </h4>";
                } else {
                    echo "<h4 class='alert alert-danger'>Unable To Inserted</h4>";
                }
            }
        }

        ### Delete Data
        if (isset($_REQUEST['delete'])) {
            $delete_query = "DELETE FROM student WHERE id=?";
            $delete_result = mysqli_prepare($connection, $delete_query);

            if ($delete_result) {
                mysqli_stmt_bind_param($delete_result, 'i', $id);

                $id = $_REQUEST['delete_id'];
                mysqli_stmt_execute($delete_result);

                echo "<h4 class='alert alert-success'>" . mysqli_stmt_affected_rows($delete_result) . " Row Deleted Sucessful<h4>";
            } else {
                echo "<h4 class='alert alert-danger'>Unable To Delete Row</h4>";
            }
        }

        ### Update Data
        if (isset($_REQUEST['edit'])) {
            $edit_query = "SELECT * FROM student WHERE id=?";
            $edit_result = mysqli_prepare($connection, $edit_query);

            if ($edit_query) {
                mysqli_stmt_bind_param($edit_result, 'i', $sid);
                $sid = $_REQUEST['edit_id'];

                mysqli_stmt_bind_result($edit_result, $sid, $sname, $sroll, $sclass);
                mysqli_stmt_execute($edit_result);
                mysqli_stmt_fetch($edit_result);
                mysqli_stmt_close($edit_result);
            }
        }
        if (isset($_REQUEST['update'])) {
            if (($_REQUEST['stu_name'] == "") || ($_REQUEST['roll_no'] == "") || ($_REQUEST['stu_class'] == "")) {
                echo "<h4 class='alert alert-danger'>Required All Fields<h4>";
            } else {
                $update_query = "UPDATE student SET name = ?, roll_no = ?, class = ? WHERE id =?";
                $update_result = mysqli_prepare($connection, $update_query);
                if ($update_result) {
                    mysqli_stmt_bind_param($update_result, 'siii', $s_name, $s_roll, $s_class, $s_id);
                    
                    $s_name = $_REQUEST['stu_name'];
                    $s_roll = $_REQUEST['roll_no'];
                    $s_class = $_REQUEST['stu_class'];
                    $s_id = $_REQUEST['update_id'];


                    mysqli_stmt_execute($update_result);
                    echo "<h4 class='alert alert-success'>" . mysqli_stmt_affected_rows($update_result) . " Row Update Sucessful</h4>";
                } else {
                    echo "<h4 class='alert alert-danger'>Unable To Update Row</h4>";
                }
                mysqli_stmt_close($update_result);
            }
        }

        ### Fetch Data
        $query = "SELECT * FROM student";
        $result = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_result($result, $id, $name, $roll_no, $class);
        mysqli_stmt_execute($result);
        ?>
    </div>
    <div class="container p-4 mt-4">
        <div class="row">
            <div class="col-md-6">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">STUDENT NAME</label>
                        <input type="text" class="form-control" id="name" name="stu_name" placeholder="ENTER STUDENT NAME" value="<?php if (isset($sname)) {
                                                                                                                                        echo $sname;
                                                                                                                                    } ?>">
                    </div>
                    <div class="mb-3">
                        <label for="roll" class="form-label">ROLL NO</label>
                        <input type="text" class="form-control" id="roll" name="roll_no" placeholder="ENTER ROLL NO" value="<?php if (isset($sroll)) {
                                                                                                                                echo $sroll;
                                                                                                                            } ?>">
                    </div>
                    <div class="mb-3">
                        <label for="class" class="form-label">CLASS</label>
                        <input type="text" class="form-control" id="class" name="stu_class" placeholder="ENTER CLASS" value="<?php if (isset($sclass)) {
                                                                                                                                    echo $sclass;
                                                                                                                                } ?>">
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn-lg" name="submit">SUBMIT</button>
                    <input type="hidden" name="update_id" value="<?php if (isset($sid)) {
                                                                        echo $sid;
                                                                    } ?>">
                    <button type="submit" class="btn btn-outline-success btn-lg" name="update">UPDATE</button>
                </form>
            </div>
            <div class="col-md-6">
                <?php mysqli_stmt_store_result($result);
                if (mysqli_stmt_num_rows($result) > 0) { ?>
                    <table class="table table-hover">
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
                            <?php while (mysqli_stmt_fetch($result)) : ?>
                                <tr>
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $name ?></td>
                                    <td><?php echo $roll_no ?></td>
                                    <td><?php echo $class ?></td>
                                    <td>
                                        <form action="" method="POST">
                                            <input type="hidden" name="delete_id" value="<?php echo $id ?>">
                                            <button type="submit" class="btn btn-outline-danger btn-sm" name="delete">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                            <input type="hidden" name="edit_id" value="<?php echo $id ?>">
                                            <button type="submit" class="btn btn-outline-success btn-sm" name="edit">
                                                <i class="fa-solid fa-pen-clip"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>

<?php

### Free Results
mysqli_stmt_free_result($result);

### Close Prepared Statement
mysqli_stmt_close($result);

### Close Connection
mysqli_close($connection);
