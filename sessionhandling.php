<?php

if (!isset($_SESSION)){
    session_start();    
}

if (count($_SESSION['webUserData'])==0){
    header("location:./login.php");
    exit();
}

$webUserData = $_SESSION['webUserData'];

?>

