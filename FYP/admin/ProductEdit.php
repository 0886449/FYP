<?php include("dataconnection.php"); ?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Product</title>
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
    <h5><b>Edit Product</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom" style="margin-left: 50px;">
  		<?php
		if(isset($_GET["edit"]))
		{
		 
			$product_id = $_GET["product_id"];
 
			$result = mysqli_query($connect, "select * from product where product_id = $product_id");
			$row = mysqli_fetch_assoc($result);
		?>
	 
		<form name="addfrm" method="post" action="">

			<p><label>Current Image</label><input type="hidden" name="product_image" id="fileToUpload" value="<?php print $row['product_image']?>"></p>
			<p><img src="../images/<?php print $row['product_image']?>" width="100" height="auto"></p>
			
			<p><label>Image</label><input type="file" name="nproduct_image" id="nfileToUpload"></p>
			
			<p><label>Product Code</label><input disabled type="text" name="product_code" value="<?php echo $row['product_code']; ?>">

			<p><label>Product Name</label><input required type="text" name="product_name" value="<?php echo $row['product_name']; ?>">
			
			<p><label>Product Price</label><input required type="text" name="product_price" value="<?php echo $row['product_price']; ?>"></input>
 
			<p><label>Product Stock</label><input required type="text" name="product_stock" value="<?php echo $row['product_stock']; ?>"></input>

			<p><label>Product Color</label><textarea required name="product_color"><?php echo $row['color']; ?></textarea>

			<p><label>Product Description</label><textarea required name="product_desc"><?php echo $row['description']; ?></textarea>
		
			<p><input type="submit" name="savebtn" value="SAVE">
 
		</form>
	    <?php 
		}
		  ?>    
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
 
if (isset($_POST["savebtn"])) 	
{
	$product_name = $_POST["product_name"];  	
	$product_price = $_POST["product_price"];  	
	$product_stock = $_POST["product_stock"];
	$product_color = $_POST["product_color"];
	$product_desc = $_POST["product_desc"];

	$nproduct_image = $_POST["nproduct_image"];
	$product_image = $_POST["product_image"]; 
	
	if($nproduct_image != "")
	{
		$updatefile= $nproduct_image;
	}
	else
	{
		$updatefile= $product_image;
	}


  	$result = mysqli_query($connect,"SELECT * from product where product_name = '$product_name' ");
  	$count = mysqli_num_rows($result);
	
	if ($count != 0)
	{
	?>
		<script type = "text/javascript">
			alert("The product name is already in use. Please change.");
		</script>
	<?php
	}
	else
	{  
	  mysqli_query($connect,"update product set product_image='$updatefile', product_name='$product_name', product_price='$product_price', product_stock='$product_stock', color='$product_color', description='$product_desc' where product_id=$product_id");
	?>	
		<script type="text/javascript">
			alert("Product Updated");
		</script>
		
  	<?php
		echo "<script>window.location='ProductList.php'</script>";
  }
}
?>