<?php

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $userid = $_POST['username'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $additionalInfo = $_POST['additional_info'];

    require_once('dbhandler.php');
    require_once('functions.inc.php');
    
    updateUserInfo($connect, $id, $userid, $age, $sex, $additionalInfo);
}
?>