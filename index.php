<?php 
require 'header.php';

if (isset($_SESSION['id'])) { 
        
    require 'includes\dbhandler.php';?>

    <section class="content">
        
        <h1>Registered members</h1>
    
        <?php   $sql = "SELECT
                    profile_images.path,
                    signup_info.*
                FROM
                    signup_info
                LEFT JOIN profile_images
                ON signup_info.profile_img_id = profile_images.id";
                
            $result = mysqli_query($connect, $sql);
                
            if (mysqli_num_rows($result) > 0 ) { ?>
            
                <ul class="users-list">
                    <?php while ($row = mysqli_fetch_assoc($result)) {
                        if (intval($row['id']) !== $_SESSION['id']) {?>
                            
                            <li> 
                                <div>
                                    <?php if (!$row['path']){ ?>
                                       <i class="fa-solid fa-dog"></i>
                                    <?php }else{?>
                                        <div class="users-list-profile-img" style=" background-image: url('<?php echo $row['path']; ?>');"></div>
                                    <?php }?>
                                      <a href="profiledisplay.php?id=<?php echo $row['id'];?>"><?php echo $row['username'];?></a>
                                      <span><i class="fa-solid fa-location-dot"></i> <?php echo $row['location'];?></span>
                                    
                                </div>
                            </li>
                                    
                        <?php }
                    }
                    mysqli_close($connect); ?>
                
                </ul>
            <?php } 
    
    ?></section>
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