<?php

if (isset($_POST["submit"])) {
    $userid = $_POST['username'];
    $userpwd = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];

    require_once('dbhandler.php');
    require_once('functions.inc.php');

    if (emptySignupInput($userid, $userpwd, $password_repeat) !== false){
        header("location: signup.php?error=emptyinput");
        exit();
    }

    if (useridExists($connect, $userid) !== false){
        header("location: signup.php?error=useridtaken");
        exit();
    } 

    if (passwordMatch($userpwd, $password_repeat) !== false){
        header("location: signup.php?error=passworderror");
        exit();
    }

    createUser($connect, $userid, $userpwd);
    } else {
        header("location: signup.php");
}