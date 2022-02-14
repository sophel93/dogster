<?php require 'header.php'; ;?>

<main>

    

</main>

<section>

    <h1>Welcome, <?php echo $_SESSION['username'];?>!</h1>
    
    <div class ="profile-info-wrapper">
        <div>
            <img src ="" class="profile-img" alt ="Profile Image">
            <a href ="edit-profile.php"><button > Edit profile </button></a>
        </div>
        
        <div>
            <ul>
                <li>Age: <?php echo $_SESSION['age'] ?? '';?></li>
                <li>Sex: <?php echo $_SESSION['sex'] ?? '';?></li>
                <li>Breed</li>
                <li>Location</li>
                <li class="flex-grow-2">Additional information: <?php echo $_SESSION['additional_info'] ?? '';?></li>
            </ul>
    </div>

</section>

<?php require 'footer.php'; ?>
