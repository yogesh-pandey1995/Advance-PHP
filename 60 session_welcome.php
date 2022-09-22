<?php

session_start();
if ((isset($_SESSION['username'])) && (isset($_SESSION['password']))) {
    echo "Youe Username : " . $_SESSION['username'] . "<br>";
    echo "Youe Password : " . $_SESSION['password'] . "<br>";

    if (isset($_REQUEST['logout'])) {
        session_unset();
        session_destroy();
        echo "<script> location.href='59 session_form.php' </script>";
    }
} else {
    echo "<script> location.href='59 session_form.php' </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <button type="submit" class="btn btn-outline-primary mt-4" name="logout">Logout</button>
    </form>
</body>

</html>