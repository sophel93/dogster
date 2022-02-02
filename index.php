<?php 

require 'header.php';
?>

<main class = "flex-column flex-centered hero" >

<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ) : ?>
    <h1 class = "mb-headers negative">Let's sniff around!</h1>
<?php else : ?>
    <h1 class = "mb-headers negative">Sign up to meet new furry friends from your area!</h1>
    <a href="sign-up-form.php"><button class ="sign-up-btn">Sign up now</button></a> 
        
<?php ; endif;?>

</main>

<section>
    <h1>Lorem ipsum</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam dignissim dignissim quam sed maximus. 
        Nunc iaculis sapien sit amet sem iaculis, eget sodales leo varius. Vestibulum a imperdiet ipsum, 
        vitae ullamcorper ipsum. Maecenas eget sem ligula. Donec sit amet aliquam libero. Curabitur eget ipsum pulvinar,</p>
</section>

<?php require 'footer.php'; 