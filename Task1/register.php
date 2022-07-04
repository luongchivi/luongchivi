<?php 

    include "connect_db.php";
    
    session_start();

    if(isset($_SESSION['username'])){
        header("Location: welcome.php");
    }

    if(isset($_POST['btn-register'])){
        
        $user_id = '';
        $role_id = 2;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        
        if($password == $repassword){
            $sql = " insert into users_tb (user_id, role_id, username, password) values('$user_id', '$role_id', '$username', '$password'); ";
            mysqli_query($conn, $sql);
            header("Location: index.php");
        }

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Register</title>
</head>

<body>
    <form method="POST" action="register.php">
        <div class="container">
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>

            <div class="form-group">
                <label for="username">Username Or Email:</label>
                <input type="username" name="username" class="form-control" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="form-group">
                <label for="repassword">Password:</label>
                <input type="password" name="repassword" class="form-control" id="repassword">
            </div>

            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
            <button type="submit" name="btn-register" class="registerbtn">Register</button>
        </div>

        <div class="container signin">
            <p>Already have an account? <a href="index.php">Login</a></p>
        </div>
    </form>
</body>

</html>