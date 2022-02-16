<?php 

require 'header.php';

?>


<section style = "background-image: url('images\729709408-huge.jpg');">
<?php if (isset($_SESSION['id'])) : ?>
    <h1>Let's sniff around!</h1>
<?php else : ?>
    <h1>Sign up to meet new furry friends from your area!</h1>
    <a href="signup.php"><button>Sign up now</button></a> 
        
<?php ; endif;?>
</section>


<section>
    <?php if (isset($_SESSION['id'])) { 

        require 'includes\dbhandler.php';

        $sql = "SELECT id, username, location FROM signup_info";
        $result = mysqli_query($connect, $sql);
        
        if (mysqli_num_rows($result) > 0 ) { ?>
            <h1>Meet some of our latest users</h1>
            <ul>
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
       <?php }
    } else { ?>
    <h1>Lorem ipsum</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam dignissim dignissim quam sed maximus. 
        Nunc iaculis sapien sit amet sem iaculis, eget sodales leo varius. Vestibulum a imperdiet ipsum, 
        vitae ullamcorper ipsum. Maecenas eget sem ligula. Donec sit amet aliquam libero. Curabitur eget ipsum pulvinar,</p>
    <?php } ?>
</section>

 

<?php require 'footer.php'; 