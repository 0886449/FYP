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
			
			//$result = mysqli_query($connect, "select * from product,purchase where purchase_product_code = product_code and `cid`='$_SESSION[id]'");	//select attributes from 2 tables
			//$count = mysqli_num_rows($result);
			$user_id = $_SESSION["id"];
			$orders_list = "SELECT o.order_id,o.user_id,o.product_id,o.qty,p.product_name,p.product_price FROM vorders o,products p WHERE o.user_id='$user_id' AND o.product_id=p.product_id";
			$query = mysqli_query($connect,$orders_list);
			if (mysqli_num_rows($query) > 0) {
				while ($row=mysqli_fetch_array($query)) {
					?>
							<div class="col-md-6">
								<table>
									<tr><td>Product Name</td><td><b><?php echo $row["product_name"]; ?></b> </td></tr>
									<tr><td>Product Price</td><td><b><?php echo $row["product_price"]; ?></b></td></tr>
									<tr><td>Quantity</td><td><b><?php echo $row["qty"]; ?></b></td></tr>
								</table>
							</div>
						</div>
					<?php
				}
			}
			?>
		</table>
        <p><h4>Total:RM<?php echo number_format($total,2)?></h4></p>
		<?php				
	}		
?>


        <button type="button" onclick="document.location.href='inde.php';">Back</button>


</body>
</html>