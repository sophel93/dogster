<?php

require 'header.php';



?>

<section>
    <div class = "wrapper">
    <form action="includes\edit-profile.inc.php" method="post">
        <input type = "hidden" name ="id" value="<?php echo $_SESSION['id']; ?>"></input>
        <input type="text" name="username" placeholder="Username" value = "<?php echo $_SESSION['username'];?>"></input>
        <input type="number" name="age" placeholder="Age" value = " <?php echo $_SESSION['age'] ?? ''; ?>"></input>
        <!--<select name="breed" placeholder = "Breed"></select>
        <select name="location" placeholder = "Location"></select>-->
        <select name="sex" placeholder="Sex">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="neutered male">Neutered Male</option>
            <option value="spayed female">Spayed Female</option>
        </select>
        <select name="location" placeholder="Location">
            <?php require 'includes\dbhandler.php';

            $sql = "SELECT * FROM user_locations";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0 ) { 
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <option>
                       <?php echo $row['location'];?>
                    </option>
                <?php }
            }
            mysqli_close($connect); ?>
        </select>
        <textarea name = "additional_info" rows = "30" cols ="10" placeholder="Additional information" value = " <?php echo $_SESSION['additional_info'] ?? '';?>"></textarea>
        
        <button type="submit" name="update">Save changes</button>
        <button type="submit" name="delete">Delete profile</button>
    </form>
            </div>
</section>

<?php 

if (isset($_GET["error"])) {
    if($_GET["error"] == "emptyinput"){
        echo"<p> Please fill in all fields! </p>";
    } 
    else if($_GET["error"] == "useridtaken"){
        echo"<p> The username is already taken. </p>";
    } else if($_GET["error"] == "none"){ 
        echo"<p> Profile info updated. </p>";
    } 
}
require 'footer.php'; ?>