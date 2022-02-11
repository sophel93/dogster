<?php

function emptySignupInput($userid, $userpwd, $password_repeat){
    $result;

    if(empty($userid) || empty($userpwd) || empty($password_repeat)){
        $result = true;
    } else{
        $result = false;
    } 
    
    return $result;
}

function useridExists($connect, $userid){
    
    $sql = "SELECT * FROM signup_info WHERE username = ?;";
    $stmt = mysqli_stmt_init($connect);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        
        header("location: signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $userid);
    mysqli_stmt_execute($stmt);

    $results = mysqli_stmt_get_result($stmt);


    if ($row = mysqli_fetch_assoc($results)) {
        return $row;
    } else {
        $results = false;
        return $results;
    }
}


function passwordMatch($userpwd, $password_repeat){
    $result;

    if ($userpwd !== $password_repeat){
        $result = true;
    
    } else {
        $result = false;
    
    }
    return $result;
}


function createUser($connect, $userid, $userpwd){
    
    $sql = "INSERT INTO signup_info (username, password) VALUES (?, ?);";
    
    $stmt = mysqli_stmt_init($connect);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: signup.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($userpwd, PASSWORD_DEFAULT);



    mysqli_stmt_bind_param($stmt, "ss", $userid, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: ../signup.php?error=none");
    exit();

}

function emptyLoginInput($userid, $userpwd){
    $result;

    if(empty($userid) || empty($userpwd)){
        $result = true;
    } else{
        $result = false;
    } 
    
    return $result;
}

function loginUser($connect, $userid, $userpwd){
    $useridExists = useridExists($connect, $userid);

    if ($useridExists === false){
        header("location: ../login.php?error=loginfailed");
        exit();
    }

    $hashedPassword = $useridExists['password'];
    $verifiedPassword = password_verify($userpwd, $hashedPassword);

    if ($verifiedPassword === false){
        header("location: ../login.php?error=passworderror");
        exit();
    } else if ($verifiedPassword === true){
        session_start();
        $_SESSION['id'] = $useridExists['id'];
        $_SESSION['username'] = $useridExists['username'];
        header("location: homepage.php");
        exit();
    }
}

function updateUserInfo($connect, $id, $userid, $age, $sex, $additionalInfo){
    
    $useridExists = useridExists($connect, $userid);

    if($useridExists === true){
        header("location: ../edit-profile.php?error=useridtaken");
        exit();
    }

    $sql = "UPDATE signup_info SET username= ?, age= ?, sex= ?, additional_info= ? WHERE id=$id";

    $stmt = mysqli_stmt_init($connect);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../edit-profile.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $userid, $age, $sex, $additionalInfo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    session_start();
    $_SESSION['username'] = $userid;
    $_SESSION['age'] = $age;
    $_SESSION['sex'] = $sex;
    $_SESSION['additional_info'] = $additionalInfo;
    header("Location: ../edit-profile.php?error=none");
    exit();
}
