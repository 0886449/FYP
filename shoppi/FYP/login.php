<?php
    require_once 'dataconnection.php';
	session_start();
	if(ISSET($_POST['login'])){
		$user_email = $_POST['email'];
		$user_password = $_POST['password'];
	
		$query = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$user_email' AND `password` = '$user_password'") or die(mysqli_error());
		$fetch = mysqli_fetch_array($query);
		$row = mysqli_num_rows($query);
		
		if($row > 0){
			$_SESSION['id']=$fetch['id'];
			echo "<script>alert('Login Successfully!')</script>";
            header("location: inde1.php");
		}else{
			echo "<script>alert('Invalid username or password')</script>";
			echo "<script>window.location='inde.php'</script>";
		}
		
	}


    /*if ($_SERVER['REQUEST_METHOD']=='POST')
    {
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    
  
    $result = mysqli_query($connect,"SELECT * from users where email ='$user_email' and password='$user_password'");
    $count = mysqli_num_rows($result);
    if($count==1) 
    {
    }
    else
    {
        echo"INVALID";
    }
    */
?>