<?php include("dataconnection.php"); ?>
<?php
	session_start();
	if(!ISSET($_SESSION['id'])){
		header('location:login.php');
	}
	$query = mysqli_query($connect, "SELECT * FROM `users` WHERE `id`='$_SESSION[id]'");
	$fetch = mysqli_fetch_array($query);
	$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Purchase</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="style.css">
<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display";
  letter-spacing: 5px;
}
</style>
</head>
<body>

<!-- Navbar (sit on top) -->
<?php require("header.php"); ?>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px" id="home">
  <img class="w3-image" src="/w3images/hamburger.jpg" alt="Hamburger Catering" width="1600" height="800">
  <div class="w3-display-bottomleft w3-padding-large w3-opacity">
    <h1 class="w3-xxlarge">Le Catering</h1>
  </div>
</header>

<!-- Page content -->
<div class="w3-content" style="max-width:1100px">
<?php
	if(isset($_REQUEST["buy"]))
	{
		$pcode = $_GET["procode"];
		$result = mysqli_query($connect, "select * from product where product_code = '$pcode'");
		$row = mysqli_fetch_assoc($result);
	}
?>
<?php
if (isset($_POST["orderbtn"])) 	
{
	$email = $fetch["email"];
	$cid = $fetch["id"];
	$color = $_POST["color"]; 	
	$cqty = $_POST["cust_qty"]; 
	$pprice = $row["product_price"]; 
	$balance = $row["product_stock"] - $cqty;
	
	//if($row['product_stock'] >= $cqty)
	if($balance>=0)
	{
		mysqli_query($connect,"insert into purchase (cemail, cid, purchase_color, purchase_quantity, purchase_product_price, purchase_product_code) values ('$email','$cid','$color',$cqty, $pprice,'$pcode')");//insert data into purchase table
 
		mysqli_query($connect,"UPDATE product SET product_stock='$balance' where product_code='$pcode'");// update product table
		
		header("location:cloth.php#cloth");
	}
	else
	{	//display alert box
		?>
			
			<script type="text/javascript">
				alert("Your quantity is more than the stock that we have. Please change.");
			</script>	
		<?php
	}
	
}

?>
  <!-- Section -->
  <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
	<img src="../images/<?php print $row['product_image']?>" class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="600" height="750">
    </div>

	<form name="purchasefrm" method="post" action="">

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center"><?php echo $row['product_name']; ?><br>
	  <hr>

	  <h5 class="w3-center"><span class="price"><?php echo $row['description']; ?></span></h5><br>
	  <hr>

      <h5 class="w3-center"><span class="price">RM<?php echo $row['product_price']; ?></span></h5><br>
	
      <p class="w3-center">
	  Color : 
			<select name="color">
				<option value="white">white</option>
				<option value="black">black</option>
			</select>
	  </p><br>

	  <p class="w3-center">
		Quantity :
		  <input type="number" name="cust_qty" min="1" max="100" value="1" />
	  </p><br>

	  <p class="w3-center">
		<input type="submit" class="btn" name="orderbtn" value="Add to cart">
	  </p>
	  <hr>

     
	</form>

    </div>

  
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

