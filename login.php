<?php require 'header.php';

if (isset($_GET["error"])) { ?>
   <div class="alert"><?php if($_GET["error"] == "emptyinput"){ 
      echo"<p> Fill in all fields! </p>";
        
    } else if($_GET["error"] == "loginfailed"){
        echo "<p> Username doesn't exist.</p>";
    } else if($_GET["error"] == "passworderror"){
        echo "<p> Incorrect password. </p>";
    } ?>
    </div>
<?php } ?>
<section class = "log-in">
<div class = "form-wrapper">
    <form action="includes\login.inc.php" method="post">
        <h1> Log in </h1>
        <label for = "username">Username</label>
        <input type="text" name="username" placeholder="Username"></input>
        <label for = "password">Password</label>
        <input type="password" name="password" placeholder="Password"></input>
        <button type="submit" name="submit">Log in</button>
    </form>
</div>
</section>

 <?php require 'footer.php'; ?>