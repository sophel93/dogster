<?php 

require 'header.php';
?>

<section>
    
    <div class = "wrapper bg-lg-transparent">
      <form action ="log-in-validation.php" method ="post">
        <label for="username">Enter username:</label>
        <input type="text" id="username" name="username" required>
        <label for="pwd">Enter password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Log In">
      </form>
    </div>
</section>

<?php require 'footer.php'; 