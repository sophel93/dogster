<?php 

session_start();

$_SESSION;

$connect = mysqli_connect('localhost', 'root', '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dogster - Make new four legged friends!</title>
    <link rel = "stylesheet" href = "styles.css">
</head>
<body>
<nav>
    <div>
        <ul>
            <li><a href="index.php">Home</a></li>
</ul>
<ul>
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) : ?>
        <li><a href="homepage.php">My profile</a></li>
        <li><a href="log-out.php">Log out</a></li>
    
    <?php else : ?>
        <li><a href="sign-up-form.php">Sign up</a></li>
        <li><a href="log-in-form.php">Log in</a></li>
    <?php ;

    endif; ?>
</ul>
</div>
</nav>