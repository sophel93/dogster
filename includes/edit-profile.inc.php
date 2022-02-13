<?php

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $userid = $_POST['username'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $additionalInfo = $_POST['additional_info'];

    require_once('dbhandler.php');
    require_once('functions.inc.php');
    
    if (emptyInput($userid, $age, $sex, $additionalInfo) !== false){
        header("location: ../edit-profile.php?error=emptyinput");
        exit();
    }

    if (useridExists($connect, $userid) !== false){
        header("location: ../edit-profile.php?error=useridtaken");
        exit();
    }

    updateUserInfo($connect, $id, $userid, $age, $sex, $additionalInfo);

}

if(isset($_POST['delete'])){
    $id = $_POST['id'];

    require_once('dbhandler.php');
    require_once('functions.inc.php');

    deleteUser($connect, $id);
}