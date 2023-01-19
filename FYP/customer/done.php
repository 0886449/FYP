<?php include("dataconnection.php") ;
$total=0;
?>
<?php
	session_start();
	if(!ISSET($_SESSION['id'])){
		header('location:login.php');
	}

	$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucessfull</title>
	<style>
		td{
			text-align: center;
		}
	</style>
</head>
<body>
<div style="margin-left: 500px;"> 
<h1>Order Summary</h1>
<?php

$r = mysqli_query($connect, "SELECT * FROM orders ORDER BY orderid  DESC LIMIT 1 ");	
if(mysqli_num_rows($r)>0)
{
	foreach($r as $row)
	{	?>
		<p>Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   :<?php echo $row["fname"]; ?></p>
		<p>Email&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  :<?php echo $row["email"]; ?></p>
        <p>Phone Number :<?php echo $row["phone"]; ?></p>
        <p>Address&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp      :<?php echo $row["address"]; ?></p>
		<?php
	}

}
?>

<!--
$result = mysqli_query($connect, "select * from orders WHERE `cid`='$_SESSION[id]'");	
	while($row = mysqli_fetch_assoc($result))
	{
		?>		
		<p>Name:<?php echo $row["fname"]; ?></p>
		<p>Email:<?php echo $row["email"]; ?></p>
        <p>Phone Number:<?php echo $row["phone"]; ?></p>
        <p>Address:<?php echo $row["address"]; ?></p>
					
	}		
?>
-->

<table border="1" width="650px">
			<tr>
				<th>Product</th>
				<th>Color</th>
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
					<td><?php echo $row["purchase_color"]; ?></td>
					<td><?php echo $row["purchase_quantity"]; ?></td>
					<td><?php echo number_format($pay,2); ?></td>
					<?php 	$total += $pay;?>
				</tr>				
				<?php
				}

				$result2 = mysqli_query($connect, "DELETE FROM purchase WHERE cid = $id");	//select attributes from 2 tables

			}
			?>
</table>

        <p><h4>Total:RM<?php echo number_format($total,2)?></h4></p>
		<p>Payment Status : Successfull</p>
		<button type="button" onclick="document.location.href='cloth.php#cloth'">Back</button>
</div>	 

</body>
</html>