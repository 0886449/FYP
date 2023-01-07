<?php include("dataconnection.php") ;
$total=0;
?>
<?php
	session_start();
	if(!ISSET($_SESSION['id'])){
		header('location:login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucessfull</title>
</head>
<body>  
<h1>Payment have been paid successfully</h1>
<?php
$result = mysqli_query($connect, "select * from orders WHERE `cid`='$_SESSION[id]'");	
	while($row = mysqli_fetch_assoc($result))
	{
		?>		
		<p>Name:<?php echo $row["fname"]; ?></p>
		<p>Email:<?php echo $row["email"]; ?></p>
        <p>Phone Number:<?php echo $row["phone"]; ?></p>
        <p>Address:<?php echo $row["address"]; ?></p>
		
		<table border="1" width="650px">
			<tr>
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
					<td><?php echo $row["product_name"]; ?></td>
					<td><?php echo $row["purchase_quantity"]; ?></td>
					<td><?php echo number_format($pay,2); ?></td>
					<?php 	$total += $pay;?>
				</tr>				
				<?php
				}
			}
			?>
		</table>
		<?php	
					
	}		
?>
        <p><h4>Total:RM<?php echo number_format($total,2)?></h4></p>
        <button type="button" onclick="document.location.href='inde.php';">Back</button>


</body>
</html>