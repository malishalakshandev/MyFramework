<?php

$action = $_GET['action'];
include 'functions.php';

$functions = new Administration();

if($action == 'admin_login'){
    $return = $functions->loginValidation();
    echo $return;
}

if($action == 'add-page-form'){
    $return = $functions->addPage();
    echo $return;
}

if($action == 'register_user'){
    $return = $functions->registerUser();
    echo $return;
}







?>