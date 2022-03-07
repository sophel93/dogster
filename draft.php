<?php 
require 'header.php';

if (isset($_SESSION['id'])) { 
        
    require 'includes\dbhandler.php';?>

    <section class="content">
        
        <form action="\dogster\includes\filter-users.inc.php" method="post">
            <h1>Filter users by location to find nearby friends!</h1>
            <select name="location" placeholder="Location">
                
                <?php $sql = "SELECT * FROM user_locations";
                      $result = mysqli_query($connect, $sql);

                        if (mysqli_num_rows($result) > 0 ) { 
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                
                                <option>
                                    
                                    <?php echo $row['location'];?>
                                
                                </option>
                            <?php }
                        }?>
            </select>
            <button type="submit" name="filter">Find users from chosen area</button>
        </form>
    
    <?php  require_once 'includes\functions.inc.php';
        $location = null;
        if (!filterUsers($connect, $location)) { ?>
        
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
                        if ($row['id'] !== $_SESSION['id']) {?>
                            
                            <li>
                                <div>
                                    <?php if (!$row['path']){ ?>
                                        <i class="fa-solid fa-dog"></i>
                                    <?php }else{?>
                                        <div class="users-list-profile-img" style=" background-image: url('<?php echo $row['path']; ?>');"></div>
                                    <?php }?>
                                      <a href="profiledisplay.php?id=<?php echo $row['id'];?>"><?php echo $row['username'];?><br><?php echo $row['location'];?></a>
                                </div>
                            </li>
                                    
                        <?php }
                    }
                    //mysqli_close($connect); ?>
                
            </ul>
            <?php } elseif (filterUsers($connect, $location)){
                    $sql = "SELECT
                                profile_images.path,
                                signup_info.*
                            FROM
                                signup_info
                                LEFT JOIN profile_images
                                ON signup_info.profile_img_id = profile_images.id
                            WHERE
                                signup_info.location = ?;";
            
                    $result = mysqli_query($connect, $sql);
                    if (mysqli_num_rows($result) > 0 ) { ?>
                
                    <ul class="users-list">
                        <?php while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['id'] !== $_SESSION['id']) {?>
                                
                                <li>
                                    <div>
                                        <?php if (!$row['path']){ ?>
                                            <i class="fa-solid fa-dog"></i>
                                        <?php }else{?>
                                            <div class="users-list-profile-img" style=" background-image: url('<?php echo $row['path']; ?>');"></div>
                                        <?php }?>
                                        <a href="profiledisplay.php?id=<?php echo $row['id'];?>"><?php echo $row['username'];?><br><?php echo $row['location'];?></a>
                                    </div>
                                </li>
                                        
                            <?php }
                        }
                    }?> 
    
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

    } 

} require 'footer.php'; 