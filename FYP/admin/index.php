<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css" />
    <title>Admin Login</title>
</head>  
<body>

<div class="box">

                <h2>Sign in</h2>
                <p>Welcome Admin </p>
                <form action="loginp.php" method="post">
                  <div class="inputBox">
                    <input type="email" name="email" required onkeyup="this.setAttribute('value', this.value);"  value="">
                    <label>Email</label>
                  </div>

                  <div class="inputBox">
                        <input type="password" name="password" required onkeyup="this.setAttribute('value', this.value);" value="">
                        <label>Password</label>
                    </div>

                  <input type="submit" name="login" value="Sign In">
                </form>
</div>

</body>
</html>

