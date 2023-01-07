<?php
    require_once 'dataconnection.php';
	session_start();
	if(ISSET($_POST['subforgot'])){
		$user_email = $_POST['login_var'];
		$query = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$user_email'");
		$fetch = mysqli_fetch_array($query); //fetches a single row from a result
		$row = mysqli_num_rows($query);

        $token = rand();
        $inresult = mysqli_query($connect,"insert into pass_reset values('','$user_email','$token')"); 
		
		if($row > 0){
			$_SESSION['id']=$fetch['id'];
			echo "<script>alert('Login Successfully! $token')</script>";
            echo "<script>window.location='verify.php'</script>";
		}else{
			echo "<script>alert('Invalid email')</script>";
			echo "<script>window.location='forgotpass.php'</script>";
		}
		
	}
?>