<?php require 'header.php';

?>

<section class="signup-form">
    <form action="includes\signup.inc.php" method="post">
        <input type="text" name="username" placeholder="Create username"></input>
        <input type="password" name="password" placeholder="Create password"></input>
        <input type="password" name="repeat-password" placeholder="Confirm password"></input>
        <button type="submit" name="submit">Sign up</button>
    </form>
</section>

<?php require 'footer.php'; ?>