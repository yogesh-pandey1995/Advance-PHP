<?php
// Session Start Function
$start_session = session_start();

$uname = "admin";
$upass = "pass1234";
// Set Session Variable
$_SESSION['username'] = $uname;
$_SESSION['password'] = $upass;

// Checking Session Set Or Not
if ((isset($_SESSION['username'])) && (isset($_SESSION['password']))) {
    // Access Session variable
    echo $_SESSION['username'] . "<br>";
    echo $_SESSION['password'] . "<br>";
} else {
    echo "Session Variable Not Set";
}
