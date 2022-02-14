<?php
session_start();

if (isset($_GET['id'])) {
    $target_user_id = $_GET['id'];
    $user_id = $_SESSION['id'];


    require_once('dbhandler.php');
    require_once('functions.inc.php');

    addToFavorites($connect, $user_id, $target_user_id);

}