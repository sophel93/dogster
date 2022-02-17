<?php 
    require 'header.php';

?>

<?php if (isset($_SESSION['id'])) { ?>

    <section class="content">
    
        <?php require 'includes\dbhandler.php';

        $sql = "SELECT id, username, location FROM signup_info";
        $result = mysqli_query($connect, $sql);
            
        if (mysqli_num_rows($result) > 0 ) { ?>
            
            <h1>Registered members</h1>
                <ul class="users-list">
                    <?php while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['id'] !== $_SESSION['id']) {?>
                            <li>
                                <div>
                                    <i class="fa-solid fa-dog"></i>
                                        <a href="profiledisplay.php?id=<?php echo $row['id'];?>"><?php echo $row['username'];?></a>
                                </div>
                            </li>
                        <?php }
                    }
        mysqli_close($connect); ?>
                </ul>
        <?php } ?>
            
</section>
<?php } else {?>
<section class ="hero">
    <div class="hero-content-wrapper">
        <h1>Dogster - meet new furry friends!</h1>
        <p>Dogster is a social network for dog owners who want to find their beloved pets company. 
            <br>Become a member to see your local tail-waggers!</p>
        <a href="signup.php"><button>Sign up now</button></a>
    </div>
</section>
<?php }

require 'footer.php'; 