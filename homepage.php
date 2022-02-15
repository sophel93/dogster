<?php require 'header.php';

$id = $_SESSION['id'];?>


<section>

    <h1>Welcome, <?php echo $_SESSION['username'];?>!</h1>
    
    <div class ="profile-info-wrapper">
        
            <img src ="" class="profile-img" alt ="Profile Image">
            <a href ="edit-profile.php"><button > Edit profile </button></a>
        
            <ul>
                <li>Age: <?php echo $_SESSION['age'] ?? '';?></li>
                <li>Sex: <?php echo $_SESSION['sex'] ?? '';?></li>
                <li>Breed</li>
                <li>Location</li>
                <li class="flex-grow-2">Additional information: <?php echo $_SESSION['additional_info'] ?? '';?></li>
            </ul>
    </div>
    <div class = "user-favorites-wrapper">
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

            <ul>
            <?php while ($row = mysqli_fetch_assoc($result)){?>
                
            <li><a href ="profiledisplay.php?id=<?php echo $row['id']; ?>"><?php echo $row['username'];?></a></li>
            <?php } ?>
            <ul><?php } else {?>
            <h2>No favorite users to display </h2><?php }
        
        ?>
    </div>

</section>

<?php require 'footer.php'; ?>
