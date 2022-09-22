<?php
// Session Start Function
$start_session = session_start();

$uname = "admin";
$upass = "pass1234";
// Set Session Variable
$_SESSION['username'] = $uname;
$_SESSION['password'] = $upass;

// Access Session Variable
echo $_SESSION['username'] . "<br>";
echo $_SESSION['password'] . "<br>";

// Unset Single Variable
### unset($_SESSION['password']);

// Unset All Variable
### session_unset();

// Delete Session
session_destroy();