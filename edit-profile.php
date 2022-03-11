<?php

require 'header.php';

if (isset($_GET["error"])) { ?>
    <div class="alert">
        <?php if($_GET["error"] == "usernametaken"){ 
            echo"<p> Username is already taken! </p>";
        } elseif($_GET["error"] == "none"){
            echo"<p>Profile info updated.</p>";
        }
            ?>
    </div>
 <?php } ?>

<section class = "edit-profile">
    <h1>Edit profile information</h1>
    <div class = "form-wrapper">
    <form enctype="multipart/form-data" class="edit-profile" action="includes\edit-profile.inc.php" method="post">
        <div class="form-group-s"><input type = "hidden" name ="id" value="<?php echo $_SESSION['id']; ?>"></input>
        <label for="username">Change username</label>
        <input type="text" name="username" placeholder="Username" value = "<?php echo $_SESSION['username'];?>"></input>
        <label for="age">Change age</label>
        <input type="number" name="age" placeholder="Age" value = " <?php echo $_SESSION['age'] ?? ''; ?>"></input>
        <label for="age">Change sex</label>
        <select name="sex" placeholder="Sex">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="neutered male">Neutered Male</option>
            <option value="spayed female">Spayed Female</option>
        </select>
        <label for="profile-img">Change profile image</label>
        <input type="file" name="profile-img" value= "<?php echo $_SESSION['path'] ?? '' ?>"></input>
    </div>
        
        <div class="form-group-s">
        <label for="age">Change breed</label>
            <select name="breed" placeholder = "Breed">
                <?php require 'includes\dbhandler.php';

                    $sql = "SELECT * FROM dog_breeds";
                    $result = mysqli_query($connect, $sql);

                    if (mysqli_num_rows($result) > 0 ) { 
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option>
                            <?php echo $row['breed'];?>
                            </option>
                        <?php }
                    }
                    mysqli_close($connect); ?>
            </select>
        
            <label for ="location">Change location</label>
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

                <label for ="additional_info">Edit additional info</label>
        <textarea name = "additional_info" placeholder="Additional information" value = " <?php echo $_SESSION['additional_info'] ?? '';?>"></textarea>
        
        </div>
        
    <div class="form-group-s">
        
    </div>
        <div class="form-group-l">
        <button type="submit" name="update">Save changes</button>
        <button type="submit" name="delete">Delete profile</button>
        </div>
    </form>
            </div>
</section>

<?php 


require 'footer.php'; ?>