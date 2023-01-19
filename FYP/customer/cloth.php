<?php include("dataconnection.php") ?>

<?php
	session_start();
	if(!ISSET($_SESSION['id'])){
		header('location:login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Padini Online System</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="style.css">
<style type="text/css">
html,body,h1,h2,h3,h4 {font-family:"Lato", sans-serif}
.mySlides {display:none}
.w3-tag, .fa {cursor:pointer}
.w3-tag {height:15px;width:15px;padding:0;margin-top:6px}

#main-container
{
		border:1px solid white;
}
#box1
{
	width:300px;
	border:2px solid white;
	float:left;
	border-radius:2px;
	margin-bottom:10px;
}
</style>
</head>
<body class="w3-content" style="max-width:1200px">

<!-- Links (sit on top) -->
<div class="w3-top" style="margin-left: -160px;">
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

<!-- !PAGE CONTENT! -->
<div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">
    <!-- Top header -->
  <div class="w3-container w3-xlarge" style="margin-top: 50px;">
    <p class="w3-left">Padini Online System</p>
    <p class="w3-right">
      <a class="fa fa-shopping-cart w3-margin-right" href="cart.php"></a>
    </p>
  </div>

  <?php
  $query = mysqli_query($connect, "SELECT * FROM `users` WHERE `id`='$_SESSION[id]'") or die(mysqli_error($connect));
  $fetch = mysqli_fetch_array($query);
  echo "<h4> &nbsp&nbsp Hello  ".$fetch['username']."</h4>";
  ?>

  <!-- Image header -->
  <div class="w3-display-container w3-container">
    <img src="../images/unsisex label.jpg" alt="cloth" style="width:100%">
    <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">
      <h1 class="w3-jumbo w3-hide-small">New arrivals</h1>
      <h1 class="w3-hide-large w3-hide-medium">New arrivals</h1>
      <h1 class="w3-hide-small">COLLECTION 2023</h1>
      <p><a href="#cloth" class="w3-button w3-black w3-padding-large w3-large">SHOP NOW</a></p>
    </div>
  </div>

  <div class="w3-container w3-text-grey" id="cloth">
    <p></p>
  </div>

  <!-- Product grid -->
  <div class="w3-row w3-grayscale">

  <?php
			$result = mysqli_query($connect, "select * from product where product_isDelete=0");	

	    while($row = mysqli_fetch_assoc($result))
			{
				?>		
				<div id="main-container">
					<div id="box1" style="margin-left:50px">

          <div class="w3-display-container">
            <img src="../images/<?php print $row['product_image']?>" width="100%" height="auto">
            <div class="w3-display-middle w3-display-hover">
              <a href="purchase.php?buy&procode=<?php echo $row['product_code']; ?>"><button class="w3-button w3-black" >Buy now <i class="fa fa-shopping-cart"></i></button></a>
            </div>
          </div>
          <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $row["product_name"]; ?><br><b class="w3-text-red">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspRM<?php echo $row["product_price"]; ?></b></p>
					</div>
				</div>
				<?php				
			}		
	?>
  </div>

  <!-- Footer -->
  <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
    <div class="w3-row-padding">

      <div class="w3-col s4">
        <h4>About</h4>
        <p><a href="#">About us</a></p>
        <p><a href="#">We're hiring</a></p>
        <p><a href="#">Support</a></p>
        <p><a href="#">Find store</a></p>
        <p><a href="#">Shipment</a></p>
        <p><a href="#">Payment</a></p>
        <p><a href="#">Gift card</a></p>
        <p><a href="#">Return</a></p>
        <p><a href="#">Help</a></p>
      </div>

      <div class="w3-col s4 w3-justify">
        <h4>Store</h4>
        <p><i class="fa fa-fw fa-map-marker"></i> POS Company</p>
        <p><i class="fa fa-fw fa-phone"></i> 0123456789</p>
        <p><i class="fa fa-fw fa-envelope"></i>pos@mail.com</p>
        <h4>We accept</h4>
        <p><i class="fa fa-fw fa-cc-amex"></i> Amex</p>
        <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
        <br>
        <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
        <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
        <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
        <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
        <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
      </div>
    </div>
  </footer>

  <div class="w3-black w3-center w3-padding-24"><a href="" title="W3.CSS" target="_blank" class="w3-hover-opacity"></a></div>

  <!-- End page content -->
</div>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</body>
</html>
