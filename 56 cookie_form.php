<?php
$cookie_name = "UserData";
$cookie_pass = "PasswordData";
if (isset($_REQUEST['submit'])) {
    $cookie_value0 = $_REQUEST['email'];
    $cookie_value1 = $_REQUEST['password'];
    $cookie_time = time() + (60 * 60 * 24 * 2);
    setCookie($cookie_name, $cookie_value0, $cookie_time);
    setCookie($cookie_pass, $cookie_value1, $cookie_time);
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Hello, world!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        <hr>

        <?php if ((isset($_COOKIE[$cookie_name])) && (isset($_COOKIE[$cookie_pass]))) {
            echo "Name Of emailCookie is<b> $cookie_name </b>and Value Is <b>" . $_COOKIE[$cookie_name] . "</b><br>";
            echo "Name Of passwordCookie is<b> $cookie_pass </b>and Value Is <b>" . $_COOKIE[$cookie_pass] . "</b>";
        } else {
            echo "Cookie Not Set";
        } ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>