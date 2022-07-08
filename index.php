<?php 
require 'header.php';

if (isset($_SESSION['id'])) { 
        
    require 'aside.php'; ?>
    
    <section class="flex-column margin-aside">
        
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
                                    <a href="profiledisplay.php?id=<?php echo $row['id'];?>">
                                        <?php if (!$row['path']){ ?>
                                            <div class="users-list-profile-img"></div>
                                        <?php }else{?>
                                            <div class="users-list-profile-img" style=" background-image: url('<?php echo $row['path']; ?>');"></div>
                                        <?php }?>
                                        <?php echo $row['username'];?>
                                    </a>
                                        <?php if (!$row['location']){ ?>
                                            <span><i class="fa-solid fa-location-dot"></i>N/A</span>
                                        <?php }else{ ?>
                                            <span><i class="fa-solid fa-location-dot"></i> <?php echo $row['location'];?></span>
                                        <?php } ?>
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
                        <!--<a href="signup.php"><button>Sign up now</button></a>-->
                </div>
                <div class = "form-wrapper">
                    <?php if (isset($_GET["error"])) { ?>
                        <div class="alert"><?php if($_GET["error"] == "emptyinput"){ 
                            echo"<p> Fill in all fields! </p>";
                                
                            } else if($_GET["error"] == "loginfailed"){
                                echo "<p> Username doesn't exist.</p>";
                            } else if($_GET["error"] == "passworderror"){
                                echo "<p> Incorrect password. </p>";
                            } ?>
                            </div>
                    <?php } ?>
                    <form action="includes\login.inc.php" method="post">
                        <h1> Log in </h1>
                        <div class="form-group">
                        <label for = "username">Username</label>
                        <input type="text" name="username" placeholder="Username"></input>
                        </div>
                        <div class="form-group">
                        <label for = "password">Password</label>
                        <input type="password" name="password" placeholder="Password"></input>
                        </div>
                        <button type="submit" name="submit">Log in</button>
                        <a href="#">Not a member yet? Sign up now!</a>
                    </form>
                </div>
            </section>
        <?php }
require 'footer.php'; 
