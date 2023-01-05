<?php include("dataconnection.php");
$total=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cart</title>

	<script type="text/javascript">
 
	function confirmation()
	{
		answer = confirm("Do you want to delete？");
		return answer;
	}
 
</script>
</head>
<body>
<a href="inde.php"><h1>cart</h1></a>
 
		<table border="1" width="650px">
			<tr>
				<th>Product</th>
				<th>Product Name</th>							
				<th>Quantity</th>
				<th>Price</th>
				<th>Delete</th>
			</tr>
			
			<?php
			
			$result = mysqli_query($connect, "select * from product,purchase where purchase_product_code = product_code" );	//select attributes from 2 tables
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
					<td><img src="<?php print $row['product_image']?>" width="100" height="auto"></td>
					<td><?php echo $row["product_name"]; ?></td>
					<td><?php echo $row["purchase_quantity"]; ?></td>
					<td><?php echo number_format($pay,2); ?></td>
					<?php $total += $pay;?>
					<td><a href="order_details.php?del&purchase_id=<?php echo $row['purchase_id']; ?>" onclick="return confirmation();">Delete</a></td>
				</tr>
				
				<?php
				
				}
			}
			
			?>
		</table>
		<p><h4>Total:RM<?php echo number_format($total,2)?></h4></p>

		<p><a href="checkout.php" >check out</p>

</body>
</html>

<?php
if (isset($_REQUEST["del"])) 
{
	$purchid = $_REQUEST["purchase_id"]; 
	mysqli_query($connect, "delete from purchase where purchase_id = $purchid");
	
	header("Location: order_details.php");
}
 
?>