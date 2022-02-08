<?php

if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_repeat = $_POST['repeat-password'];

    require_once('dbhandler.php');
    require_once('functions.inc.php');

    /*if (emptySignupInput($username, $password, $password_repeat) !== false){
        
        header("location: signup.php?error=emptyinput");
        exit();
    }*/

    if (usernameExists($connect, $username) !== false){
        header("location: signup.php?error=usernametaken");
        exit();
    } 

    if (passwordMatch($password, $password_repeat) !== false){
        header("location: signup.php?error=passworderror");
        exit();
    }

    createUser($connect, $username, $password);
    } else {
        header("location: signup.php");
}