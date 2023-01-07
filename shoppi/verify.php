<?php include("dataconnection.php") ?>
<?php
	session_start();
	if(!ISSET($_SESSION['id'])){
		header('location:index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
	$query = mysqli_query($connect, "SELECT * FROM `users` WHERE `id`='$_SESSION[id]'") or die(mysqli_error());
	$fetch = mysqli_fetch_array($query);
?>
<form action="verifyp.php" method="post">
<p><input type="text" name="email" value="<?php echo $fetch["email"]; ?>"></p>
</br>
<label class="label_txt">code </label>
      <input type="text" name="code" class="form-control" required>
  </div>
  <button type="submit" name="set" class="btn btn-primary btn-group-lg form_btn">Done</button>
</form>

</body>
</html>

<?php
 if(ISSET($_POST['set']))
 {
    $user_email = $_POST['email'];
	$code = $_POST['code'];
	
	$query = mysqli_query($connect, "SELECT * FROM `pass_reset` WHERE `email` = '$user_email' AND `token` = '$code'");
	$fetch = mysqli_fetch_array($query); //fetches a single row from a result
	$row = mysqli_num_rows($query);
		
		if($row > 0){
			$_SESSION['id']=$fetch['id'];
			echo "<script>alert('Login Successfully!')</script>";
            echo "<script>window.location='resetpass.php'</script>";
 		}else{
			echo "<script>alert('Invalid username or password')</script>";
            echo "<script>window.location='forgotpass.php'</script>";
 		}
 }
?>