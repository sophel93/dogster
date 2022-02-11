<?php 

require 'header.php';

?>


<section class = "flex-column flex-centered hero" style = "background-image: url('images\729709408-huge.jpg');">
<?php if (isset($_SESSION['id'])) : ?>
    <h1 class = "mb-headers">Let's sniff around!</h1>
<?php else : ?>
    <h1 class = "mb-headers">Sign up to meet new furry friends from your area!</h1>
    <a href="signup.php"><button class ="sign-up-btn">Sign up now</button></a> 
        
<?php ; endif;?>
</section>


<section class="index-content">
    <h1>Lorem ipsum</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam dignissim dignissim quam sed maximus. 
        Nunc iaculis sapien sit amet sem iaculis, eget sodales leo varius. Vestibulum a imperdiet ipsum, 
        vitae ullamcorper ipsum. Maecenas eget sem ligula. Donec sit amet aliquam libero. Curabitur eget ipsum pulvinar,</p>
</section>

<?php require 'footer.php'; 