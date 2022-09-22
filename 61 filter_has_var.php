<?php
if (isset($_REQUEST['submit'])) {
    if (filter_has_var(INPUT_POST, 'uname')) {
        echo "Username is POST Method";
    } else {
        echo "Username Not a POST Method";
    }
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
    <div class="container">
        <form action="" method="POST">
            
            <div class="mb-3">
            <label for="name" class="form-label">Username</label>
                <input type="text" name="uname" class="form-control" id="name" placeholder="Username...">
                <button type="submit" class="btn btn-outline-primary mt-4" name="submit">Submit</button>
            </div>

        </form>
    </div>
</body>

</html>