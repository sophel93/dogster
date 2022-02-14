<?php require_once 'header.php';

    require_once 'includes\dbhandler.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM signup_info WHERE id=$id";

    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_assoc($result);

?>


<section> 
    <div class = "profile-info-wrapper">
    <ul>
                <li>Age: <?php echo $row['age']; ?></li>
                <li>Sex:<?php echo $row['sex']; ?></li>
                <li>Breed</li>
                <li>Location</li>
                <li class="flex-grow-2">Additional information: <?php echo $row['additional_info'];?></li>
            </ul>
    </div>

</section>



















<?php require_once 'footer.php';?>