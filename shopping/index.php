<?php include("dataconnection.php"); ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PADINI</title>
</head>
<body> 
		<table border="1" width="650px">
			<?php
			
			$result = mysqli_query($connect, "select * from product where product_isDelete=0");	
	        while($row = mysqli_fetch_assoc($result))
			{
				?>			
				<tr>
					<td><?php echo $row["product_code"]; ?></td>
					<td><?php echo $row["product_image"]; ?></td>
					<td><?php echo $row["product_name"]; ?></td>
					<td>RM<?php echo $row["product_price"]; ?></td>
					<td><a href="purchase.php?buy&procode=<?php echo $row['product_code']; ?>">Buy Now</a></td>
				</tr>
				<?php
				
			}		
			
			?>
		</table>
</body>
</html>