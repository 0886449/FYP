<?php include("dataconnection.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <link href="register.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <div class="background">
        <form action="login.html">
            <div class="content-register-form">
                <table>
                    <thead>
                        <th colspan="3" style="text-align: center">CREATE AN ACCOUNT</th>
                    </thead>
                    <tr></tr>
                    <tr>
                        <td><label for="name">Username:</label></td>
                        <td colspan="3"><input type="text" id="name" name="name" pattern="[a-zA-z]{4,15}" minlength="4" maxlength="15" required></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password:</label></td>
                        <td colspan="3"><input type="password" id="password" name="password" minlength="8" maxlength="16" required></td>
                    </tr>
                    <tr>
                        <td><label for="cfm-password">Confirm Password:</label></td>
                        <td colspan="3"><input type="password" id="cfm-password" name="cfm-password" minlength="8" maxlength="16" required></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td colspan="3"><input type="email" name="email" id="email" placeholder="abc@xxx.my" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}" required></td>
                    </tr>
                    <tr>
                        <td><label for="phone">Phone number:</label></td>
                        <td colspan="3"><input type="text" name="phone" id="phone" placeholder="xxx-xxxxxxx" pattern="[0][1][0-9]-[0-9]{7,8}" required></td>
                    </tr>
                    <tr>
                        <td><label for="gender">Gender:</label></td>
                        <td colspan="3"><input type="text" name="gender" id="gender" placeholder="M/F" pattern="([Mm]|[Ff])" required></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submit" value="Submit"></td>
                            
                        <td colspan="3" style="text-align: right"><input type="reset" value="Reset"></td>

                        <td><input type="button" value="View" onclick="location='list.php'"></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</body>
</html>

<?php
 
if (isset($_POST["submit"])) 	
{
	$user_id = $_POST["id"];  	
	$user_name = $_POST["username"];  	
	$user_password = $_POST["password"];  
	$user_email = $_POST["email"];
	$user_pnumber = $_POST["phone_number"];	
    $user_gender = $_POST["gender"];	
	
$result = mysqli_query($connect,"SELECT * from users where id = '$user_id'" );
$count=mysqli_num_rows($result);
	
	if ($count != 0)
	{
	?>
		<script type = "text/javascript">
			alert("The user is already in use. Please change.");
		</script>
	<?php
	}
	else
	{
		//else insert into database
		mysqli_query($connect,"INSERT INTO users (id,username,password,email,phone_number,gender) 
		             VALUES('$user_id','$user_name','$user_password','$user_email ','$psuser_pnumber','$user_gender')");
	
	?>
		<script type="text/javascript">
			alert(" Record saved!");
		</script>
	<?php
	
	}
}
 
?>