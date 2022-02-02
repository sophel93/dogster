<?php 

require 'header.php';
?>

<section>
    
    <div class = "wrapper bg-lg-transparent">
      <form action ="sign-up.php" method ="post" class = "sign-up-form">
        <label for="username">Create username:</label>
        <input type="text" id="username" name="username" required>
        <label for="pwd">Create password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Create profile">
      </form>
    </div>
</section>

<?php require 'footer.php'; 

