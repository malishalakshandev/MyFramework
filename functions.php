<?php

if (!isset($_SESSION)){
    session_start();    
}

include '../include/dbconnection.php';

class Administration {

    function loginValidation() {
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password' AND user_role='1'";
        $result = $con->query($sql);

        if($result->num_rows > 0) {
            $userData = $result->fetch_array();
            $_SESSION['userData'] = $userData;
            return 1;
        }else{
            return 2;
        }

    }

    function addPage() {
        
        $data = "";
        $date_created = date("Y-m-d");
        
        $page_title = $_POST['pagetitle'];
        $page_description = $_POST['pagedescription'];
        if(isset($_POST['status'])) {
            $page_status = '1';
        }else{
            $page_status = '2';
        }

        $con = $GLOBALS['con'];
        $sql = "INSERT INTO page(page_title,page_description,page_path,page_status,date_created) VALUES('$page_title','$page_description','','$page_status','$date_created')";
        $result = $con -> query($sql) or die($con->error);
        
        $last_page_id = $con->insert_id;
        $page_path = $last_page_id."_".(str_replace(" ",'_',$page_title)).'.html';
        $sql_update_path = "UPDATE page SET page_path='$page_path' WHERE id='$last_page_id'";
        $result=$con->query($sql_update_path) or die($con->error);

        file_put_contents($page_path, $page_description);

        return 1;

    }

    function registerUser() {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $date_created = date("Y-m-d");

        $con = $GLOBALS['con'];
        $sql = "INSERT INTO user(first_name,last_name,email_address,username,password,user_role,date_registered) VALUES('$firstname','$lastname','$email','$username','$password','1','$date_created')";
        $result = $con -> query($sql) or die($con->error);

        return 1;
    }

    function getUserList() {
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM user ORDER BY id ASC";
        $result=$con->query($sql);
        return $result;
    }
}


?>