<?php require 'header.php';

?>

<section>
    <form action="includes\signup.inc.php" method="post">
        <input type="text" name="username" placeholder="Create username"></input>
        <input type="password" name="password" placeholder="Create password"></input>
        <input type="password" name="password_repeat" placeholder="Confirm password"></input>
        <button type="submit" name="submit">Sign up</button>
    </form>
</section>

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
    } else if($_GET["error"] == "none"){ 
        echo"<p> Sign up complete, you may now log in. </p>";
    } 
}

require 'footer.php'; ?>