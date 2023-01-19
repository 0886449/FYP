<?php include("dataconnection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style type="text/css">
body{
    background-color: #EEEEEE;  
}
#login-title
{
	background-color:#DDD;
	background-image:url(images/padlock.png);
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
	background-color:#0066FF;
	width:300px;
	padding:10px;
	border:0px;
	color:white;
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
	/*text-align:center;*/
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
<form action="fotgotpassp.php" method="post">

<div style="margin: auto; border:1px solid #DDD; border-radius:10px; width:400px; padding:0px; background-color: white; margin-top:80px">

	<div id="login-title">
		<h4 style="margin:0px; padding:12px 40px; color:blue; font-family:Arial;">Forgot Password</h4>
	</div>	
	<div id="login-form">
		<form name="loginfrm">
			<p><input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[com]" placeholder="Enter your email address" required/></p>
			<p><input type="submit" name="next" value="NEXT" /></p>
		</form>

        <tr>
        </tr>
         			
	</div>		
</div>
</form>

</body>
</html>

