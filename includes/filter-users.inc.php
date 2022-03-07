<?php 

if(isset($_POST['filter'])){
    $location = $_POST['location'];

    require_once('dbhandler.php');
    require_once('functions.inc.php');

    filterUsers($connect, $location);
}

