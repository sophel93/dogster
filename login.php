<?php require 'header.php';

?>

<section class="login-form">
    <form action="login.inc.php" method="post">
        <input type="text" name="username" placeholder="Create username"></input>
        <input type="password" name="password" placeholder="Create password"></input>
        <button type="submit" name="submit">Log in</button>
    </form>
</section>

<?php require 'footer.php'; ?>