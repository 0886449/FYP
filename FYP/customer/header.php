<php? session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <!-- Links (sit on top) -->
<div class="w3-top">
  <div class="w3-row w3-large w3-light-grey">
    <div class="w3-col m2">
      <a href="#" class="w3-button w3-block"></a>
    </div>
    <div class="w3-col m2">
      <a href="index1.php" class="w3-button w3-block">Home</a>
    </div>
    <div class="w3-col m2">
      <a href="cloth.php" class="w3-button w3-block">Plans</a>
    </div>
    <div class="w3-col m2">
      <a href="index1.php#about" class="w3-button w3-block">About</a>
    </div>
    <div class="w3-col m2">
      <a href="index1.php#contact" class="w3-button w3-block">Contact</a>
    </div>
    <div class="w3-col m2">
      <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn"><i class="fas fa-user" id="login-btn"></i></button>
        <div id="myDropdown" class="dropdown-content">
          <a href="myprofile.php">My profile</a>
          <a href="changepass.php">Change Password</a>
          <a href="customer_order.php">Order Details</a>
          <a href="logout.php">Log Out</a>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>