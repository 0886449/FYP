<?php include("dataconnection.php"); ?>
 
<html>
<head><title>Product Edit</title>
<link href="design.css" type="text/css" rel="stylesheet" />
</head>
<body>
 
<div id="wrapper">
 
	<div id="left">
		<?php include("menu.php"); ?>
	</div>
	
	<div id="right">
 
		<?php
		if(isset($_GET["edit"]))
		{
		 
			$product_id = $_GET["product_id"];
 
			$result = mysqli_query($connect, "select * from product where product_id = $product_id");
			$row = mysqli_fetch_assoc($result);
		?>
		
		<h1>Product</h1>
 
		<form name="addfrm" method="post" action="">

			<p><img src="../images/<?php print $row['product_image']?>" width="100" height="auto"></p>

			<p><label>Image</label><input type="file" name="product_image" id="fileToUpload" value="../images/<?php print $row['product_image']?>"></p>

			<p><label>Product Name</label><input type="text" name="product_name" size="10" value="<?php echo $row['product_name']; ?>">
			
			<p><label>Product Price</label><textarea name="product_price"><?php echo $row['product_price']; ?></textarea>
 
			<p><label>Product Stock</label><textarea name="product_stock"><?php echo $row['product_stock']; ?></textarea>
			
			<p><input type="submit" name="savebtn" value="SAVE">
 
		</form>
	    <?php 
		}
		  ?>
	</div>
	
</div>
 
 
</body>
</html>
 
<?php
 
if (isset($_POST["savebtn"])) 	
{
	$product_image = $_POST["product_image"];  	
	$product_name = $_POST["product_name"];  	
	$product_price = $_POST["product_price"];  	
	$product_stock = $_POST["product_stock"];  	
	
	mysqli_query($connect,"update product set product_image='$product_image', product_name='$product_name', product_price=$product_price, product_stock=$product_stock where product_id=$product_id");
	
	?>
	
		<script type="text/javascript">
			alert("Product Updated");
		</script>
	
	<?php
	
	header( "refresh:0.5; url=ProductList.php" );
	
}
 
?>