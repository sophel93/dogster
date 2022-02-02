<?php

require 'header.php';

$connect = mysqli_connect('localhost', 'root', '');

mysqli_select_db($connect, 'signup_db');

$username = $_POST['username'];
$password = $_POST['password'];

$username_query = "SELECT * FROM signup_info WHERE username = '$username'";

$query_result = mysqli_query($connect, $username_query);

$username_rows = mysqli_num_rows($query_result);

if (strlen($username) < 6) :
    
    echo 'Username has to be atleast 6 characters long.';

elseif ($username_rows >= 1) :
    echo 'Username is already taken, pick another one!';

else :
    $sign_up = " INSERT INTO signup_info(username , password) VALUES ('$username' , '$password') "; 

    mysqli_query($connect, $sign_up);

    echo 'Sign up complete, you may now log in!';

endif;
?>