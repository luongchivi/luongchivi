<?php 

    include "connect_db.php";
    
    session_start();

    if(isset($_SESSION['username'])){
        header("Location: welcome_admin.php");
    }

    if(isset($_POST['btn-login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = " select users_tb.username, users_tb.password, roles_tb.rolename from users_tb, roles_tb where username = '$username' and password = '$password' and roles_tb.role_id = '1' and roles_tb.role_id = users_tb.role_id ";

        //$sql = " select username, password from users_tb where username = '$username' and password = '$password' ";

        $results = mysqli_query($conn, $sql);

        if(mysqli_num_rows($results) == 1){
            $_SESSION['username'] = $username;
            header("Location: welcome_admin.php");
        } else {
            echo '<h5 style="color:red;">Invalid email address or password!<h5>';
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
    <title>Login</title>
</head>

<body>
    <form method="POST" action="index.php">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="username" name="username" class="form-control" id="username">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="checkbox">
            <label><input type="checkbox"> Remember me</label>
        </div>

        <div>
            <button type="submit" name="btn-login" class="btn btn-default">Login</button>
        </div>
    </form>
    <form action="register.php">
        <button type="submit" name="btn-register" class="btn btn-default">Register</button>
    </form>
</body>

</html>