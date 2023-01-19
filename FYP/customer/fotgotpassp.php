<?php
    include 'dataconnection.php';
	session_start();
	if(ISSET($_POST['next'])){
		$email = $_POST['email'];

		$query = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
		$fetch = mysqli_fetch_array($query); //fetches a single row from a result
		$row = mysqli_num_rows($query);

		if($row > 0){
			$_SESSION['id']=$fetch['id'];
			echo "<script>alert('Successfully')</script>";
            echo "<script>window.location='resetpass.php'</script>";
		}else{
			echo "<script>alert('Invalid email')</script>";
			echo "<script>window.location='forgotpass.php'</script>";
		}
		
	}
?>