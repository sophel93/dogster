<?php

require 'header.php';

?>

<section class="edit-profile-form">
    <form action="includes\edit-profile.inc.php" method="post">
        <input type = "hidden" name ="id" value="<?php echo $_SESSION['id']; ?>"></input>
        <input type="text" name="username" placeholder="Username"></input>
        <input type="number" name="age" placeholder="Age"></input>
        <!--<select name="breed" placeholder = "Breed"></select>
        <select name="location" placeholder = "Location"></select>-->
        <select name="sex">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="neutered male">Neutered Male</option>
            <option value="spayed female">Spayed Female</option>
        </select>
        <textarea name = "additional_info" rows = "30" cols ="10" placeholder="Additional information"></textarea>
        
        <button type="submit" name="update">Save changes</button>
    </form>
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