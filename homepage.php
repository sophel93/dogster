<?php require 'header.php';

require_once 'includes\dbhandler.php';

$id = $_SESSION['id'];

    /*$sql = "SELECT * FROM signup_info WHERE id = ?;";*/
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
    $backEndPath = $row['path']; ?>


<section>

<h1>Welcome, <?php echo $_SESSION['username'];?>!</h1>

    <div class="flex-wrapper">
        
        <div class ="profile-img" style="background-image: url('<?php echo $backEndPath;?>');"></div>
        
            <ul class = "profile-info">
                <li>Age: <?php echo $_SESSION['age'] ?? '';?></li>
                <li>Sex: <?php echo $_SESSION['sex'] ?? '';?></li>
                <li>Breed: <?php echo $_SESSION['breed'] ?? '';?></li>
                <li>Location: <?php echo $_SESSION['location'] ?? '';?></li>
                <li>Additional information: <?php echo $_SESSION['additional_info'] ?? '';?></li>
            </ul>
            <a href ="edit-profile.php" class = "edit-profile-btn"><button > Edit profile </button></a>
    </div>
        
<h2>Favorites</h2>
    
    <div class="flex-wrapper">
        <?php  require_once 'includes\dbhandler.php';
            
            $sql = "SELECT
                        user_favorites.target_user_id,
                        signup_info.*
                    FROM
                        user_favorites
                        LEFT JOIN signup_info
                        ON signup_info.id = user_favorites.target_user_id
                    WHERE
                        user_favorites.user_id = $id;";

            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0 ) { ?>

            <ul class = "users-list">

                <?php while ($row = mysqli_fetch_assoc($result)){
                   ?>
                    
                <li>
                    <div>
                        <i class="fa-solid fa-dog"></i>
                                
                        <a href ="profiledisplay.php?id=<?php echo $row['id']; ?>"><?php echo $row['username'];?></a>
                    </div>
                </li>
                <?php } ?>
            </ul> 

<?php } else {?>
    <p>No favorites to display </p><?php }

?>
</div>
    
   

</section>

<?php require 'footer.php'; ?>