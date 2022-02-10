<?php 

session_start();
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
            <li><a href="index.php">Home</a></li>
</ul>
<ul>
    <?php if (isset($_SESSION['id'])) {
        echo '<li><a href="homepage.php">My profile</a></li>';
        echo '<li><a href="logout.php">Log out</a></li>';
    
    } else {
        echo '<li><a href="signup.php">Sign up</a></li>';
        echo '<li><a href="login.php">Log in</a></li>';
    } ?>
</ul>
</div>
</nav>

<main class = "flex-column flex-centered hero" >