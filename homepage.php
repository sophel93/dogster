<?php require 'header.php'; ;?>

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
        <ul>
            <li><a href ="#"></a></li>
        <ul>
    </div>

</section>

<?php require 'footer.php'; ?>
