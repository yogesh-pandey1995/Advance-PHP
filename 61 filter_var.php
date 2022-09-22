<?php

$email = 'yogesh@gmail.com';
$femail = filter_var($email, FILTER_VALIDATE_EMAIL);

if ($femail) {
    echo "Email Is Valid " . $email . "<br>";
} else {
    echo "Invalid Email";
}

$name = "Yogesh Pandey";
echo filter_var($name, FILTER_CALLBACK, array("options"=>"strtoupper")) . "<br>";

function myfunction($info){
    return str_replace("email", "yogeshpandey@gmail.com", $info);
}
$info = "This is my new email and you can add on this email";
echo filter_var($info, FILTER_CALLBACK, array("options"=>"myfunction"));
