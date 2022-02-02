<?php require 'header.php'; 

$connect = mysqli_connect('localhost', 'root', '');

mysqli_select_db($connect, 'signup_db');


if (isset($_POST['update'])) :
    $id = $_SESSION['id'];
    $username = $_POST['username'];
    $password =  $_POST['password'];
    $age =  $_POST['age'];
    $sex =  $_POST['sex'];
    $breed =  $_POST['breed'] ?? '';
    $location =  $_POST['location'] ?? '';
    $additional_info =  $_POST['additional_info'];

    $query = "SELECT * FROM signup_info WHERE id = '$id'";
    $run_query = mysqli_query($connect, $query);

    $query_result = mysqli_fetch_assoc($run_query);

    $current_user_id = $query_result['id'];

    if ($current_user_id === $id) :

        $update_profile = "UPDATE signup_info SET username = '$username', password ='$password', age = '$age', sex = '$sex', breed = '$breed', 
        location = '$location', additional_info = '$additional_info' WHERE id = '$id'";

        var_dump($id); exit();
        
        $query_update = mysqli_query($connect, $update_profile);
        
        if ($query_update) :

            header('location: homepage.php');

        else :

            header('location: edit-profile-form.php');
            echo('Oops, something went wrong.');

        endif;
    
    else :

        header('location: edit-profile-form.php');
        echo('Oops, something went wrong.');
    
    endif;

endif;
    