<?php

if (isset($_POST['submit'])){
    $userid = $_POST['username'];
    $userpwd = $_POST['password'];

    require_once('dbhandler.php');
    require_once('functions.inc.php');

    if (emptyLoginInput($userid, $userpwd) !== false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($connect, $userid, $userpwd);
} else {
    header("location: ../login.php");
    exit();
}