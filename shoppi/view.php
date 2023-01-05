<?php include("dataconnection.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>
<body>
<table border="1" width="650px">
<tr>
		 <th>Image</th>
		 <th>Product Name</th>	
         <th>Price</th>						
		 <th>Quantity</th>
	 </tr>
    <?php
	    if(isset($_REQUEST["viewd"]))
		{
		$orderid = $_GET["orderid"];
 
		$result = mysqli_query($connect, "select * from orders where orderid = '$orderid'");
		$row = mysqli_fetch_assoc($result);
		}

        $result1 = mysqli_query($connect, "select * from product, order_items where orders_id = '$orderid' and prod_id = product_id");
		$count = mysqli_num_rows($result1);
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
				while($row = mysqli_fetch_assoc($result1))
				{
				?>			
 
				<tr>
					<td><img src="images/<?php print $row['product_image']?>" width="100" height="auto"></td>
                    <td><?php echo $row["product_name"]; ?></td>
					<td><?php echo $row["product_price"]; ?></td>
					<td><?php echo $row["qty"]; ?></td>
				</tr>
				
				<?php
				
				}
			}
	?> 
 </table>
</body>
</html>