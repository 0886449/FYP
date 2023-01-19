<?php include("dataconnection.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style type="text/css">
body{
    background-color: #EEEEEE;  
}

#login-title
{
	background-color:#DDD;
	/*background-image:url(images/padlock.png);*/
	background-repeat:no-repeat;
	background-position:7px 7px;
	background-size:24px 24px;
	border-radius:8px 8px 0px 0px;
	height:40px;
}
 
#login-form
{
	padding:10px;
	text-align:center;
}
 
#login-form input[type=email], [type=password]
{
	width:250px;
	border-radius:5px;
	border:1px solid #ddd;
	height:25px;
	padding:5px 10px 5px 40px
}
 
#login-form input[type=email]
{
	background-image:url(images/email.png);
	background-repeat:no-repeat;
	background-position:10px 10px;
}
 
#login-form input[type=password]
{
	background-image:url(images/key.png);
	background-repeat:no-repeat;
	background-position:10px 10px;
}
 
#login-form input[type=submit]
{
	background-color:#EEF1F7;
	width:300px;
	padding:10px;
	border:0px;
	color:black;
	font-weight:bold
}
 
#login-form input[type=submit]:hover
{
	background-color:#2C61B7;
	cursor:pointer
}
 
#login-form p a
{
	text-decoration:none;
	text-align:center;
	font-family:Arial Narrow;
	font-size:0.8em;
}
 
#login-form p a:hover
{
	font-style:italic;
	color:red;
}	
</style>        
    
</head>
    
<body>
<?php
    session_start();
    $id = $_SESSION['id'];
    $query = mysqli_query($connect,"SELECT * FROM `admin` where id='$id'");
    $row = mysqli_fetch_array($query);
?>
<?php
	if(ISSET($_POST['cont'])){
        $user_password = $_POST['user_password'];
        $newpass =  $_POST['password'];
	
		$query = mysqli_query($connect, "SELECT * FROM `admin` WHERE `id` = '$id' AND `password` = '$user_password'");
		$fetch = mysqli_fetch_array($query);

		$row = mysqli_num_rows($query);
		
		if($row > 0){
            $sql2=mysqli_query($connect, "update admin set password = '$newpass' where `id` = '$id'");

			echo "<script>alert('Successfully!')</script>";
			echo "<script>window.location='menu.php'</script>";
		}else{
			echo "<script>alert('Invalid')</script>";
			echo "<script>window.location='changepass.php'</script>";
		}
		
	}
?>    
<form action="" method="post">

<div style="margin: auto; border:1px solid #DDD; border-radius:10px; width:400px; padding:0px; background-color: white; margin-top:80px" >

	<div id="login-title">
		<h4 style="margin:0px; padding:12px 40px; color:black; font-family:Arial;">Change Password</h4>
	</div>	
	<div id="login-form">
		<form name="loginfrm">
			<p><input type="password" name="user_password" placeholder="Enter your old password" required/></p>
			<p><input type="password" name="password" placeholder="New Password" minlength="8" maxlength="16" required/></p>
			<p><input type="password" name="confirm_password" placeholder="Confirm Password" minlength="8" maxlength="16" required/></p>
			<p><input type="submit" name="cont" value="Continue" /></p>
		</form>         			
	</div>		
</div>
</form>

</body>
</html>



