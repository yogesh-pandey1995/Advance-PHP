<?php
// Session Start Function
$start_session = session_start();
if ((!isset($_SESSION['username'])) && (!isset($_SESSION['password']))) {
    if ((isset($_REQUEST['email'])) && (isset($_REQUEST['password']))) {
        $uname = $_REQUEST['email'];
        $upass = $_REQUEST['password'];
        // Set Session Variable
        $_SESSION['username'] = $uname;
        $_SESSION['password'] = $upass;
        echo "<script> location.href='60 session_welcome.php' </script>";
    }
} else {
    echo "<script> location.href='60 session_welcome.php' </script>";
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Session</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="Email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" id="Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
        </form>
        <hr>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>