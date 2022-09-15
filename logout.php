<?php
if (!isset($_SESSION)){
    session_start();
}

unset($_SESSION['userData']);
header("location:./login.php");

?>