<?php 
session_start();
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dogster - Make new four legged friends!</title>
    <link rel = "stylesheet" href = "css\styles.css">
    
</head>
<body>


    <nav>
        <div>
            <ul>
                    <li><a href="index.php"><i class="fa-solid fa-house"></i> Home</a></li>
            </ul>
            
            <ul class="ul-rtl">
                <?php if (isset($_SESSION['id'])) {
                    echo '<li><a href="homepage.php"><i class="fa-solid fa-paw"></i> My profile</a></li>';
                    echo '<li><a href="includes\logout.inc.php"><i class="fa-solid fa-right-from-bracket"></i> Log out</a></li>';
                
                } else {
                    echo '<li><a href="signup.php"><i class="fa-solid fa-paw"></i> Sign up</a></li>';
                    echo '<li><a href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Log in</a></li>';
                } ?>
            </ul>
        </div>
    </nav>



<main>