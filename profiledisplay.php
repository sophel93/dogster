<?php require_once 'header.php';

    require_once 'includes\dbhandler.php';

    $id = $_GET['id'];

    $sql = "SELECT
            profile_images.path,
            signup_info.*
        FROM
            signup_info
            LEFT JOIN profile_images
            ON signup_info.profile_img_id = profile_images.id
        WHERE
            signup_info.id = ?;";


    $stmt = mysqli_stmt_init($connect);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../edit-profile.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    $row = mysqli_fetch_assoc($result);

            $name = $row['username'];
            $id = $row['id'];
            $age = $row['age'];
            $sex = $row['sex'];
            $breed = $row['breed'];
            $location = $row['location'];
            $additional_info = $row['additional_info'];
            $backEndPath = $row['path'];
            $profileImgId = $row['profile_img_id'];
?>


<section>
<h1><?php echo $name;?></h1>
    <div class="flex-wrapper">
        
        <div class="profile-img" style="background-image: url('<?php echo $backEndPath; ?>');"></div>
        <ul>
            <li>Age: <?php echo $age; ?></li>
            <li>Sex: <?php echo $sex; ?></li>
            <li>Breed: <?php echo $breed;?></li>
            <li>Location: <?php echo $location;?></li>
            <li>Additional information: <?php echo $additional_info;?></li>
        </ul>
            
        <?php 
        

        require_once 'includes\dbhandler.php';
                
        $current_user = $_SESSION['id'];
                
        $sql = "SELECT 
                    COUNT(target_user_id)
                FROM
                    user_favorites
                WHERE
                    user_id = $current_user
                AND target_user_id = $id;";

        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        $return_value = implode($row);

        if ($return_value > 0){?>
            <a class ="favorite-user" href="includes\remove-from-favorites.inc.php?id=<?php echo $id ;?>"><button><i class="fa-regular fa-heart"></i> Remove profile from favorites</button></a>
                    
        <?php } else {?>
            <a class ="favorite-user" href="includes\add-to-favorites.inc.php?id=<?php echo $id; ?>"><button><i class="fa-solid fa-heart"></i> Add profile to favorites</button></a>
        <?php }?>
    
    </div>
</section>

<?php require_once 'footer.php';?>