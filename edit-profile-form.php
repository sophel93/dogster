<?php require 'header.php' ?>

<div class = "wrapper bg-lg-transparent">


      <form action ="edit-profile.php" method ="post" name ="edit-profile">
        <label for="username">Change username:</label>
            <input type="text" id="username" name="username">
        <label for="pwd">Change password:</label>
            <input type="password" id="password" name="password">
        <label for="age">Edit age:</label>
            <input type="text" id="age" name="age">
        <label for="sex">Edit sex:</label>
            <select id="sex" name="sex">
                <option value="female">Female</option>
                <option value="male">Male</option>
                <option value="spayed female">Spayed female</option>
                <option value="neutered male">Neutered male</option>
            </select>
        <label for="breed">Edit breed:</label>
            <select id="breed" name="breed">
            </select>
        <label for="location">Edit location:</label>
            <select id="location" name="location">
            </select>
        <label for ="additional-info">Edit additional information:</label>
        <textarea name="additional_info" rows="50" cols="75">
        </textarea>
        <input type="submit" name="update" value="Save changes">
      </form>
</div>