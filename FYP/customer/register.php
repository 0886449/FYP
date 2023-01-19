<?php include("dataconnection.php"); ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #EEEEEE;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form name="addnewfrm" method="post" action="">
  <div class="container" style="margin: auto; border:1px solid #DDD; border-radius:10px; width:500px;">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Fullname</b></label>
    <input type="text" placeholder="Enter full name" name="name" id="name" minlength="4" maxlength="15" pattern="[A-za-z ]{4,30}" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[com]" required>

    <label for="email"><b>Phone Number</b></label>
    <input type="text" placeholder="Enter phone number" name="phone" id="phone"  pattern="[0][1][0-9][0-9]{7,8}" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" minlength="8" maxlength="16" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat"  minlength="8" maxlength="16" required>

    <input type="reset" value="Reset" style="text-align: right">

    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" name="savebtn" class="registerbtn">Register</button>
    <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
  </div>
</form>

</body>
</html>

<?php
 if (isset($_POST["savebtn"])) 	
 {
   $user_name = $_POST["name"];  
   $user_email = $_POST["email"]; 
   $user_phone_number = $_POST["phone"]; 
   $user_password = $_POST["psw"];  
   $pswrepeat = $_POST["psw-repeat"];  	
	
   
   $result = mysqli_query($connect,"SELECT * from users where email = '$user_email'" );
   $count = mysqli_num_rows($result);
   
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
    
    if($user_password == $pswrepeat)
    {
      //insert into database
      mysqli_query($connect,"INSERT INTO users (username,password,email,phone_number,gender) 
      VALUES('$user_name','$user_password','$user_email','$user_phone_number','$user_gender')");

      ?>
      <script type="text/javascript">
      alert("Successful!");
      </script>

      <?php
      header( "refresh:0.5; url=login.php" );
    }
    else{
      ?>
      <script type="text/javascript">
      alert("Passwords do not match!");
      </script>

      <?php
      header( "refresh:0.5; url=register.php" );
      
    }

  }
}
?>