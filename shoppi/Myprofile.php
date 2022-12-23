<?php include("dataconnection.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>My Profile</title>
</head>
<body>
<?php
    session_start();
    $id=$_SESSION['id'];
    $query=mysqli_query($connect,"SELECT * FROM users where id='$id'")or die(mysqli_error());
    $row=mysqli_fetch_array($query);
  ?>
<form action="Profile_update.php" method="post">
    <div id="wrapper">
        <h3>My Profile</h3>
        <div class="col-content">
            <p><label>Title:</label><input type="text" name="username" size="" value="<?php echo $row['username']; ?>">
            <p>Password: <input type="text" name="password" value="<?php echo $row['password']; ?>">
            <p>Email: <input type="email" name="email" value="<?php echo $row['email']; ?>">
            <p>No.Phone: <input type="text" name="phone_number" value="<?php echo $row['phone_number']; ?>">
            <p>Gender: <input type="text" name="gender" value="<?php echo $row['gender']; ?>">
            <p><input type="submit" name="edit"></p>
        </div>
    </div>  
</form>
</body>
</html>