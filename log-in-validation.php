<?php

require 'header.php';

$connect = mysqli_connect('localhost', 'root', '');

mysqli_select_db($connect, 'signup_db');

$username = $_POST['username'];

$password = $_POST['password'];

$username_query = "SELECT * FROM signup_info WHERE username = '$username' && password = '$password'";

$query_result = mysqli_query($connect, $username_query);

$username_rows = mysqli_num_rows($query_result);

if ($username_rows == 1) :
    
    $_SESSION['username'] = $username;
    $_SESSION['loggedin'] = true;
    header('location: homepage.php');

else :
    
    header('location: log-in-form.php');
    
    echo 'Oops, something went wrong. Try again!';

endif;

?>