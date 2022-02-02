<?php require 'header.php'; ;?>

<main>

    

</main>

<section>

    <h1>Welcome, <?php echo $_SESSION['username'];?>!</h1>
    
    <div class ="profile-info-wrapper">
        <div>
            <img src ="images\shutterstock_1875919753.jpg" class="profile-img">
            <a href ="edit-profile-form.php"><button > Edit profile </button></a>
        </div>
        
        <div>
            <ul>
                <li>Age</li>
                <li>Sex</li>
                <li>Breed</li>
                <li>Location</li>
                <li class="flex-grow-2">Additional information</li>
        </div>
    </div>

</section>

<?php require 'footer.php'; ?>
