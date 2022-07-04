<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: index.php");
    }
    $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Welcome</title>
</head>

<body>
    <form action="logout.php">
        <H4>Welcome: <?php echo "$username"; ?></H4>
        <button type="submit" name="logout" class="btn btn-default">Logout</button>
    </form>
    <table style="width:100%" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Role</th>
                <th>Username</th>
                <th>Password</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php   
            include "connect_db.php";
            $sql = " select users_tb.user_id, roles_tb.rolename, users_tb.username, users_tb.phone, users_tb.address from users_tb, roles_tb where users_tb.role_id = roles_tb.role_id ";
            $results = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($results)){
            ?>
            <br>
            <tr>
                <td> <?php echo $row['user_id'] ?> </td>
                <td> <?php echo $row['rolename'] ?> </td>
                <td> <?php echo $row['username'] ?> </td>
                <td> <?php echo '**************' ?> </td>
                <td> <?php echo $row['phone'] ?> </td>
                <td> <?php echo $row['address'] ?> </td>
                <td><a href="update.php?id=<?php echo $row['user_id'] ?>"> Update</a></td>
                <td><a href="delete.php?id=<?php echo $row['user_id'] ?>"> Delete</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>