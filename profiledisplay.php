<?php require_once 'header.php';

    require_once 'includes\dbhandler.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM signup_info WHERE id=$id";

    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_assoc($result);

    $name = $row['username'];
    $id = $row['id'];
    $age = $row['age'];
    $sex = $row['sex'];
    $additional_info = $row['additional_info'];
?>


<section> 
    <div class="wrapper">
        <h1><?php echo $name;?></h1>
        <ul>
            <li>Age: <?php echo $age; ?></li>
            <li>Sex:<?php echo $sex; ?></li>
            <li>Breed</li>
            <li>Location</li>
            <li>Additional information: <?php echo $additional_info;?></li>
        </ul>
            
        <?php require_once 'includes\dbhandler.php';
                
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
            <a href="includes\remove-from-favorites.inc.php?id=<?php echo $id ;?>"><i class="fa-solid fa-heart"></i> Remove profile from favorites</a>
                    
        <?php } else {?>
            <a href="includes\add-to-favorites.inc.php?id=<?php echo $id; ?>"><i class="fa-regular fa-heart"></i> Add profile to favorites</a>
        <?php } ?>
    
    </div>
</section>
















<?php require_once 'footer.php';?>