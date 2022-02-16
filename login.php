<?php require 'header.php';

?>

<section>
    <form action="includes\login.inc.php" method="post">
        <input type="text" name="username" placeholder="Username"></input>
        <input type="password" name="password" placeholder="Password"></input>
        <button type="submit" name="submit">Log in</button>
    </form>
</section>

<?php
if (isset($_GET["error"])) {
    if($_GET["error"] == "emptyinput"){ 
      echo"<p> Fill in all fields! </p>";
        
    } else if($_GET["error"] == "loginfailed"){
        echo "<p> Username doesn't exist.</p>";
    } else if($_GET["error"] == "passworderror"){
        echo "<p> Incorrect password. </p>";
    } 
}

 require 'footer.php'; ?>