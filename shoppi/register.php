<?php include("dataconnection.php"); ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
</head>
<body>
	<h1>CREATE AN ACCOUNT</h1>
 	<form name="addnewfrm" method="post" action="">
		<p>Username:<input type="text" name="username" >
		<p>Password:<input type="password" name="password">
		<p>Confirm Password:<input type="password" name=" ">
		<p>Email:<input type="email" name="email">
		<p>Phone number:<input type="text" name="phone_number">
		<p>Gender:<input type="text" name="gender">		
		<p><input type="submit" name="savebtn" value="Submit">
		<input type="reset" value="Reset" style="text-align: right">
	</form>		
</body>
</html>
 
<?php
 if (isset($_POST["savebtn"])) 	
{
	$user_name = $_POST["username"];  	
	$user_password = $_POST["password"];  	
	$user_email = $_POST["email"];  
	$user_phone_number = $_POST["phone_number"];
	$user_gender = $_POST["gender"];
	
	$result = mysqli_query($connect,"SELECT * from users where username = '$user_name'" );
	$count=mysqli_num_rows($result);
	
	if ($count != 0)
	{
	?>
		<script type = "text/javascript">
			alert("The account is already in use. Please change.");
		</script>
	<?php
	}
	else
	{
		//else insert into database
		mysqli_query($connect,"INSERT INTO users (username,password,email,phone_number,gender) 
		             VALUES('$user_name','$user_password','$user_email','$user_phone_number','$user_gender')");
					 
	?>
		<script type="text/javascript">
			alert(" Record saved!");
		</script>
	<html>
		
		<button type="button" name="login" id="login" onclick="location='login1.php'">
		<Label>Login</label>
	</html>
	<?php

	}
}
 
?>
