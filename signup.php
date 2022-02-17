<?php require 'header.php';

?>

<section class = "signup">
    <div class = "form-wrapper">
    <?php 

        if (isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput"){ 
            echo"<p> Fill in all fields! </p>";
                
            } else if($_GET["error"] == "useridtaken"){
                echo"<p> The username is already taken. </p>";
            } else if($_GET["error"] == "passworderror"){
                echo"<p> Passwords don't match. </p>";
            } else if($_GET["error"] == "stmtfailed"){ 
                echo"<p> Something went wrong, please try again. </p>";
            ?>
    <form action="includes\signup.inc.php" method="post">
        <h1>Sign up</h1>
        <label for = "username">Create a username</label>
        <input type="text" id="username" name="username" placeholder="Username"></input>
        
        <label for = "password">Create a password</label>
        <input type="password" id="password" name="password" placeholder="Password"></input>
        
        <label for ="password_repeat">Confirm password</label>
        <input type="password" id = "password_repeat" name="password_repeat" placeholder="Confirm password"></input>
        
        <button type="submit" name="submit">Sign up</button>
    </form> <?php } else if($_GET["error"] == "none"){ 
                echo"<h1> Sign up complete, you may now log in. </h2>";
            } 
        }?>
</div>
</section>

<?php

require 'footer.php'; ?>