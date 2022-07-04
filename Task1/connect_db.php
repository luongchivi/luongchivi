<?php

$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'management_student';

$conn = new mysqli($server, $user, $pass,$database);


if($conn){
    mysqli_query($conn, "SET NAMES 'utf8' ");
}else{
    echo "Connection Failed!";
}
    
?>