<?php include("dataconnection.php") ?>
<?php
	session_start();
	if(!ISSET($_SESSION['id'])){
        
		header('location:login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
<?php
	$query = mysqli_query($connect, "SELECT * FROM `users` WHERE `id`='$_SESSION[id]'") or die(mysqli_error());
	$fetch = mysqli_fetch_array($query);
	echo "<h2>".$fetch['email']."</h2>";
?>
<form action="" method="POST">
<label class="label_txt">Password </label>
      <input type="password" name="password" class="form-control" required>
  </div>
   <div class="form-group">
    <label class="label_txt">Confirm Password </label>
      <input type="password" name="passwordConfirm" class="form-control" required  >
  </div>
  <button type="submit" name="sub_set" class="btn btn-primary btn-group-lg form_btn">Reset Password</button>
</form>

</body>
</html>

<?php
if(isset($_GET['token']))
{
    $token= $_GET['token'];
}

 if(isset($_POST['sub_set']))
 {
    $id=$id_session;
    $pass=$_POST['password'];
    $cpass=$_POST['passwordConfirm'];
    $email=$fetch['email'];
    
    $select= "select * from users where email='$email'";
    $query = mysqli_query($connect,$select);
    $row = mysqli_fetch_assoc($query);
    $res= $row['id'];
    if($res === $id)
    {
       $update = "update users set password='$pass'";
       $sql2=mysqli_query($connect,$update);
        if($sql2)
        { 
            echo "<script>alert('Successfully!')</script>";
            /*Successful*/
            echo "<script>window.location='login1.php'</script>";
            $resultdel = mysqli_query($connect, "DELETE FROM pass_reset WHERE token='$token'");

        }
        else
        {
            /*sorry your profile is not update*/
            header('location:resetpass.php');
        }
    }
    else
    {
        /*sorry your id is not match*/
        header('location:login1.php');
    }
 }
?>