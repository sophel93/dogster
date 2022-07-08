<?php

session_start();

define("ENV_ROOT_DIRECTORY", "C:\\xampp\\htdocs\\dogster\\");

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $breed = $_POST['breed'];
    $location = $_POST['location'];
    $additionalInfo = $_POST['additional_info'];
    $backEndDir = ENV_ROOT_DIRECTORY . "uploads/";
    $backEndPath = $backEndDir . basename($_FILES['profile-img']['name']);
    $frontEndDir = "/dogster/uploads/";
    $frontEndPath = $frontEndDir . basename($_FILES['profile-img']['name']);

    
    require_once('dbhandler.php');
    require_once('functions.inc.php');
    
    move_uploaded_file($_FILES['profile-img']['tmp_name'], $backEndPath );
    
    updateUserInfo($connect, $id, $age, $sex, $breed, $location, $additionalInfo, $backEndPath, $frontEndPath);
    
}

if(isset($_POST['delete'])){
    $id = $_POST['id'];

    require_once('dbhandler.php');
    require_once('functions.inc.php');

    deleteUser($connect, $id);
}