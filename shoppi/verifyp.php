<?php
require_once 'dataconnection.php';
session_start();
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