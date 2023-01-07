<!DOCTYPE html>
<html>
<head><title>Add Product</title>
<link href="design.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div id="wrapper">

	<div id="left">
		<?php include("menu.php"); ?>
	</div>
	
	<div id="right">

		<h1>Product List</h1>

		<form name="addfrm" method="post" action="">

			<p><label>Product Code</label><input type="text" name="product_code" size="10">

			<p><label>Product Name</label><input type="text" name="product_name" size="10">
		 
			<p><label>Product Price:</label><input type="text" name="product_price" size="10">
			
			<p><label>Quantity</label><textarea  name="product_stock"></textarea>

			<p><label>Image</label><input type="file" name="product_image" id="fileToUpload"></p>
			
			<p><input type="submit" name="savebtn" value="SAVE">

		</form>
	
	</div>
	
</div>


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
 	$product_image = $_POST["product_image"];	//prod_stock under pstock
	
	
$result = mysqli_query($connect,"SELECT * from product where product_code = '$product_code'" );
$count = mysqli_num_rows($result);
	
	if ($count != 0)
	{
	?>
		<script type = "text/javascript">
			alert("The product code is already in use. Please change.");
		</script>
	<?php
	}
	else
	{
		//else insert into database
		mysqli_query($connect,"INSERT INTO product (product_code,product_name,product_price,product_stock,product_image) 
		             VALUES('$product_code','$product_name','$product_price','$product_stock','$product_image')");
	
	?>
		<script type="text/javascript">
			alert(" Record saved!");
		</script>
	<?php
	
	}
}
 
?>

