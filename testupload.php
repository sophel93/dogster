<?php

 if(isset($_POST['upload'])){
    $uploaddir = 'uploads/';
    $uploadfile = $uploaddir . basename($_FILES['img']['name']);


    
    echo '<pre>';
    if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
        header("location: index.php?error=none");
    } else {
        
        header("location: index.php?error=invalidFile");
        echo "Possible file upload attack!\n";
    }
    
    echo 'Here is some more debugging info:';
    print_r($_FILES);
    
    print "</pre>";
}
    ?>
