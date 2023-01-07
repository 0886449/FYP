<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <form action="login.php" method="post">
</head>
    
<body>
    <h1>Login</h1>
    <form>
        <div class = "container">
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter your email address" name="email" required>
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter your password" name="password" required>
        <button name="login" type="submit">Login</button>
        <a href="forgotpass.php">forgot</a>
    </form>
</body>
</html>

