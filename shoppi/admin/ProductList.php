<?php include("dataconnection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Product</title>
	<script type="text/javascript">
	function confirmation()
	{
		answer = confirm("Do you want to delete？");
		return answer;
	}
</script>
	<link href="design.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div id="wrapper">
		<div id="left">
			<?php include("menu.php"); ?>
		</div>
		<div id="right">
		<table border="1" width="650px">
			<a href="addproduct.php">+product</a>
			<tr>
				<th>Product</th>
				<th>Product Name</th>							
				<th>Price</th>
				<th>Stock</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			
			<?php
			
			$result = mysqli_query($connect, "select * from product where product_isDelete=0" );	//select attributes from 2 tables
			$count = mysqli_num_rows($result);
			if ($count < 1)
			{
			?>
				<tr>
					<td colspan="6">No Records Found</td>
				</tr>
			
			<?php
			}
			else
			{
				while($row = mysqli_fetch_assoc($result))
				{
				?>			
 
				<tr>
					<td><img src="../images/<?php print $row['product_image']?>" width="100" height="auto"></td>
					<td><?php echo $row["product_name"]; ?></td>
					<td><?php echo $row["product_price"]; ?></td>
					<td><?php echo $row["product_stock"]; ?></td>
					<td><a href="ProductEdit.php?edit&product_id=<?php echo $row['product_id']; ?>">Edit</a></td>
					<td><a href="ProductList.php?del&product_id=<?php echo $row['product_id']; ?>" onclick="return confirmation();">Delete</a></td>
				</tr>
				
				<?php
				
				}
			}
			
			?>
		</table>
		</div>
	</div>

</body>
</html>

<?php
//remove product from product list 
if (isset($_GET["del"])) 
{
	$product_id = $_GET["product_id"]; 
	//update product table and set product_isDelete to 1
	mysqli_query($connect, "update product set product_isDelete=1 where product_id='$product_id'"); //assign to 1
	
	header("Location:ProductList.php"); //after delete back to product list
}
 
?>

