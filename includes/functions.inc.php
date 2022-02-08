<?php

function emptySignupInput($username, $password, $password_repeat){
    
    $result;

    if(empty($username) || empty($password) || empty($password_repeat)){
        $result = true;
    } else{
        $result = false;
    } 
    
    return $result;
}

function usernameExists($connect, $username){
    
    $sql = "SELECT * FROM signup_info WHERE username = ?;";
    $stmt = mysqli_stmt_init($connect);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        
        header("location: signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $results = mysqli_stmt_get_result($stmt);


    if ($row = mysqli_fetch_assoc($results)) {
        return $row;
    } else {
        $results = false;
        return $results;
    }
}


function passwordMatch($password, $password_repeat){
    $result;

    if ($password !== $password_repeat){
        $result = true;
    
    } else {
        $result = false;
    
    }
    return $result;
}


function createUser($connect, $username, $password){
    
    $sql = "INSERT INTO signup_info (username, password) VALUES (?, ?);";
    
    $stmt = mysqli_stmt_init($connect);
    
    if (!mysqli_stmt_prepare($connect, $sql)) {
        header("location: signup.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);



    mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: signup.php?error=none");
    exit();

}
