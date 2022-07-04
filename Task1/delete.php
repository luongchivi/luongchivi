<?php

    include "connect_db.php";
    $id = $_GET['id'];
    $sql = " delete from users_tb where user_id = '$id' ";
    mysqli_query($conn, $sql);
    header("Location: welcome_admin.php");

?>