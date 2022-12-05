<?php include("dataconnection.php");
$total=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<a href="productlist.php"><h1>cart</h1></a>
 
		<table border="1" width="650px">
			<tr>
				<th>Purchase Id</th>
				<th>Customer Email</th>							
				<th>Product</th>
				<th>Quantity</th>
				<th>Payment (RM)</th>
			</tr>
			
			<?php
			
			$result = mysqli_query($connect, "select * from product,purchase where purchase_product_code = product_code");	//select attributes from 2 tables
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
					$pay = $row["purchase_product_price"] * $row["purchase_quantity"]; //calculate payment for each purchase
				?>			
 
				<tr>
					<td><?php echo $row["purchase_id"]; ?></td>
					<td><?php echo $row["purchase_name"]; ?></td>							
					<td><?php echo $row["product_name"]; ?></td>
					<td><?php echo $row["purchase_quantity"]; ?></td>
					<td><?php echo number_format($pay,2); ?></td>
					<td><a href="order_details.php?del&procode=<?php echo $row['product_code']; ?>" onclick="return confirmation();">Delete</a></td>
				</tr>
				
				<?php
				
				}
			}
			
			?>
		</table>
		<?php $total = $total+$pay;?>
		<p><h4>Total:RM<?php print $total?></h4></p>

		<p><a href="checkout.php" >check out</p>

</body>
</html>

<?php
//remove product from product list 
if (isset($_GET["del"])) 
{
	$pcode = $_GET["procode"]; 
	//update product table and set product_isDelete to 1
	mysqli_query($connect, "update product set product_isDelete=1 where product_code='$pcode'");
	
	header("Location:order_details.php");
}
 
?>