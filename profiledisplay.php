<?php require_once 'header.php';

    require_once 'includes\dbhandler.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM signup_info WHERE id=$id";

    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_assoc($result);

    $id = $row['id'];
    $age = $row['age'];
    $sex = $row['sex'];
    $additional_info = $row['additional_info'];
?>


<section> 
    <div class = "profile-info-wrapper">
    <ul>
                <li>Age: <?php echo $age; ?></li>
                <li>Sex:<?php echo $sex; ?></li>
                <li>Breed</li>
                <li>Location</li>
                <li class="flex-grow-2">Additional information: <?php echo $additional_info;?></li>
            </ul>
            <a href="includes\add-to-favorites.inc.php?id=<?php echo $id; ?>">Lisää vittu suosikkeihin</a>
    </div>
    


</section>

<?php


if (isset($_GET["error"])) {
    if ($_GET["error"] == "none"){
        echo "User added to favorites";
    }
}

?>

















<?php require_once 'footer.php';?>