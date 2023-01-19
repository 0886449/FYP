<?php
 include "dataconnection.php";

if (isset($_POST["savebtn"])) 	
{
	$product_image = $_POST["product_image"];  	
	$product_name = $_POST["product_name"];  	
	$product_price = $_POST["product_price"];  	
	$product_stock = $_POST["product_stock"];
	$product_color = $_POST["product_color"];
	$product_desc = $_POST["product_desc"];

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
	  mysqli_query($connect,"update product set product_image='$product_image', product_name='$product_name', product_price='$product_price', product_stock='$product_stock', color='$product_color', description='$product_desc' where product_id=$product_id");
	?>	
		<script type="text/javascript">
			alert("Product Updated");
		</script>
  	<?php
	
	  header( "refresh:0.8; url=ProductList.php" );
	
  }
}
 
?>