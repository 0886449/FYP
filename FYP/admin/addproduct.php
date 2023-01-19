<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="design.css" type="text/css" rel="stylesheet" />

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
</head>
<body class="w3-light-grey">

<?php require("header.php"); ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b>Add Product</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom" style="margin-left: 50px;">
  <form name="addfrm" method="post" action="">

	<p><label>Product Code</label><input type="text" name="product_code" required>

	<p><label>Product Name</label><input type="text" name="product_name" required>

	<p><label>Product Price </label><input type="text" name="product_price" pattern="[1-1000]{1,1000}" required></input>

	<p><label>Quantity</label> <input type="number" name="product_stock" min="0" max="100" required/></p>

	<p><label>Color</label><textarea name="product_color" required></textarea>

	<p><label>Description</label><textarea  name="product_desc" required></textarea>

	<p><label>Image</label><input type="file" name="product_image" id="fileToUpload" required></p>

	<p><button type="button" onclick="document.location.href='ProductList.php'">Back</button> <input type="submit" name="savebtn" value="ADD">

	</form>	
  </div>

  <div class="w3-panel">
    
  </div>
  <hr>

  <div class="w3-container">

  </div>
  <hr>

  <div class="w3-container">
   
  </div>
  <hr>

  <div class="w3-container">
     
  </div>
  <hr>

  <div class="w3-container">
    
  </div>
  <br>

  <div class="w3-container w3-padding-32">
     
  </div>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>

<?php
include("dataconnection.php");
if (isset($_POST["savebtn"])) 	
{
	$product_code = $_POST["product_code"]; //prod_code under pcode 	
	$product_name = $_POST["product_name"]; //prod_name under pname 	
	$product_price = $_POST["product_price"]; //prod_size under psize
	$product_stock = $_POST["product_stock"]; //prod_price under pprice 
	$product_color = $_POST["product_color"]; //prod_price under pprice 
	$product_desc = $_POST["product_desc"]; //prod_price under pprice 
 	$product_image = $_POST["product_image"];	//prod_stock under pstock
	
  $result = mysqli_query($connect,"SELECT * from product where product_name = '$product_name' or product_code = '$product_code'");
  $count = mysqli_num_rows($result);
	
	if ($count != 0)
	{
	?>
		<script type = "text/javascript">
			alert("The product code or product name is already in use. Please change.");
		</script>
	<?php
	}
	else
	{
		//else insert into database
		mysqli_query($connect,"INSERT INTO product (product_code,product_name,product_price,product_stock, color, description, product_image) 
		             VALUES('$product_code','$product_name','$product_price','$product_stock','$product_color','$product_desc','$product_image')");
	
	?>
		<script type="text/javascript">
			alert(" Record saved!");
		</script>
	<?php
	
	}
}
 
?>