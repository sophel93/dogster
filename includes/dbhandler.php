<?php

$host = "sql11.freesqldatabase.com";
$username ="sql11478953";
$password = "vrCcuh9QwZ";
$database = "sql11478953";

$connect = mysqli_connect($host, $username, $password, $database);

if (!$connect){
    die("Connection failed : " . mysqli_connect_error());
}
