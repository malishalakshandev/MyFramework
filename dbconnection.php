<?php 

class DBConnect{
    
    function connect() {
        $con = new mysqli("localhost","root","","cms");
        return $con;
    }
}
$obj = new DBConnect(); 
$con = $obj->connect(); 

?>