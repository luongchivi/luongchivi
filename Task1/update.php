<?php 
    include "connect_db.php";

    session_start();

    $user_id = $_GET['id'];
    $_SESSION['user_id'] = $user_id;
    $sql = " select username, password, phone, address from users_tb where user_id = '$user_id' ";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    $username = $row['username'];
    $_SESSION['username'] = $username;
    $oldpassword = $row['password'];
    $_SESSION['oldpassword'] = $oldpassword;
    $phone = $row['phone'];
    $address = $row['address'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Update</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data" action="update_action.php">
        <div class="container">
            <h1>Update Account</h1>
            <p>Please fill in this form to update an account.</p>
            <div class="form-group">
                <label for="username">Username Or Email:</label>
                <input type="username" name="username" class="form-control" id="username"
                    value="<?php echo $username; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="confirmoldpassword">Enter Confirm Old Password:</label>
                <input type="confirmoldpassword" name="confirmoldpassword" class="form-control" id="confirmoldpassword">
            </div>
            <div class="form-group">
                <label for="newpassword">New Password:</label>
                <input type="newpassword" name="newpassword" class="form-control" id="newpassword">
            </div>
            <label for="role">Choose role:</label>
            <select name="role_id" id="role_id">
                <option value="1">Administrator</option>
                <option value="2">Student</option>
            </select>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="phone" name="phone" class="form-control" id="phone" value="<?php echo $phone; ?>">
            </div>
            <div class="form-group">
                <label for="address">Phone:</label>
                <input type="address" name="address" class="form-control" id="address" value="<?php echo $address; ?>">
            </div>
            <button type="submit" name="btn-update" class="updatebtn">Update</button>
        </div>
    </form>
</body>

</html>