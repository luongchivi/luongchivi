<?php
    include "connect_db.php";

    session_start();

    if(isset($_POST['btn-update'])){
        $user_id = $_SESSION['user_id'];
        $role_id = $_POST['role_id'];
        $username = $_SESSION['username'];
        $newpassword = $_POST['newpassword'];
        $oldpassword = $_SESSION['oldpassword'];
        $confirmoldpassword = $_POST['confirmoldpassword'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        if($oldpassword == $confirmoldpassword){
            echo $user_id."-".$role_id."-".$username."-".$oldpassword."-".$confirmoldpassword."-".$newpassword."-".$phone."-".$address;
            $sqi = " update users_tb set role_id = '$role_id', username = '$username', password = '$newpassword', phone = '$phone', address = '$address' where user_id = '$user_id' ";
            mysqli_query($conn, $sqi);
            header("Location: welcome_admin.php");
        } else {
            $error_message = "Old password doesn't match please enter agian!";
            echo $error_message;
        }
    }

?>