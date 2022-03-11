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
    

    if ($row=mysqli_fetch_assoc($results)){
        return $row;
    } else{
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
        header("location: ../homepage.php");
        exit();
    }
}

function emptyInput($userid, $age, $sex, $breed, $location, $additionalInfo){
    $result;

    if(empty($userid) || empty($age) || empty($sex) || empty($breed) || empty($location) || empty($additionalInfo)){
        $result = true;
    } else{
        $result = false;
    } 
    
    return $result;
}


function updateUserInfo($connect, $id, $userid, $age, $sex, $breed, $location, $additionalInfo, $backEndPath, $frontEndPath){
    
    $sql = "UPDATE signup_info 
                SET username= ?, age= ?, sex= ?, breed=?, location= ?, additional_info= ? 
                WHERE id=$id";

    $stmt = mysqli_stmt_init($connect);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../edit-profile.php?error=stmtfailed");
        exit();
    }
    $useridExists = useridExists($connect, $userid);
    
    if ($_SESSION['username'] === $userid || $useridExists !== $userid){
        
        mysqli_stmt_bind_param($stmt, "sissss", $userid, $age, $sex, $breed, $location, $additionalInfo);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $userid;
        $_SESSION['age'] = $age;
        $_SESSIOM['sex'] = $sex;
        $_SESSION['breed'] = $breed;
        $_SESSION['location'] = $location;
        $_SESSION['additional_info'] = $additionalInfo;
    
    } else {
        header("location: ../edit-profile.php?error=usernametaken");
        exit();
    }
    
    if ($backEndPath){
        
        $sql = "INSERT INTO profile_images (path) VALUES (?);";
        
        $stmt = mysqli_stmt_init($connect);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../edit-profile.php?error=stmtfailed");
        exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $frontEndPath);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        
        $profileImgId = mysqli_insert_id($connect);
         
        $sql = "UPDATE signup_info
                    SET profile_img_id = $profileImgId
                    WHERE id = $id";
        mysqli_query($connect, $sql);

    }
    
    header("Location: ../edit-profile.php?error=none");
    exit();
}

function deleteUser($connect, $id){
    $sql = "DELETE FROM signup_info WHERE id = ?";

    $stmt = mysqli_stmt_init($connect);
        
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../edit-profile.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
    
    if (mysqli_stmt_execute($stmt)){

        session_start();
        session_unset();
        session_destroy();

        header("location: ../index.php");

    }
    mysqli_stmt_close($stmt);
}
    
function getUserInfo($connect, $id){
    
    require_once 'includes\dbhandler.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM signup_info WHERE id=?";

    $stmt = mysqli_stmt_init($connect);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        
        header("location: homepage.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $results = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($results)) {
        return $row;
        
        $id = $row['id'];
        $age = $row['age'];
        $sex = $row['sex'];
        $additional_info = $row['additional_info'];
   
    } else {
        $results = false;
        
        return $results;
    }

}

function addToFavorites($connect, $user_id, $target_user_id){
    $sql = "INSERT INTO user_favorites (user_id, target_user_id) VALUES (?, ?);";

    $stmt = mysqli_stmt_init($connect);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: profiledisplay.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ii", $user_id, $target_user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../profiledisplay.php?id=$target_user_id&error=none");
    session_start();
    exit();
}

function removeFromFavorites($connect, $target_user_id, $user_id){
    $sql = "DELETE FROM user_favorites WHERE target_user_id = $target_user_id AND user_id = $user_id;";

    if (mysqli_query($connect, $sql)){

        header("location: ../profiledisplay.php?id=$target_user_id&error=none");
    }
    mysqli_close($connect);
    session_start();
    exit();
}

function filterUsers($connect, $location){
    $sql = "SELECT * FROM signup_info WHERE location=?;";

    $stmt = mysqli_stmt_init($connect);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        
        header("location: index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $location);
    mysqli_stmt_execute($stmt);

    $results = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($results)) {
        header("location: index.php?error=none");
        exit();
    } else {
        header("location: index.php?error=no_users_found");
        exit();
    }
}

