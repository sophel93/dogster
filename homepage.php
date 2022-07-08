<?php   require 'header.php';
        require 'aside.php';
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
?>



?>

<section class="flex-column margin-aside">
    <div class="wrapper flex-column align-flex-start">
        <h1><?php echo $row['username'];?></h1>  
        <ul class = "profile-info">
            <li class="profile-img" style="background-image: url('<?php echo $row['path'];?>');"></li>
            <ul>
                <li class="label">Age: <li><?php echo $row['age'] ?? '';?></li></li>
                <li class="label">Sex: <li><?php echo $row['sex'] ?? '';?></li></li>
                <li class="label">Breed: <li><?php echo $row['breed'] ?? '';?></li></li>
                <li class="label">Location: <li><?php echo $row['location'] ?? '';?></li></li>
            </ul>
                <!--<li class="label">Additional information: <li></li></li>-->
        </ul>
        <h2>About me</h2>
        <p><?php echo $row['additional_info'] ?? '';?></p>
        
            <form action="includes\edit-profile.inc.php" method="post" class="flex-row justify-flex-end">
                <button class="warning" type="submit" name="delete">Delete profile</button>
                <a href="edit-profile.php">Edit profile</a>
            </form>
        
    </div>
</section>

<?php require 'footer.php'; ?>