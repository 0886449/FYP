<?php include("dataconnection.php") ?>
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
	<title>PADINI</title>

	<style type="text/css">
	#box1
	{
		width:236px;
		border:2px solid;
		float:left;
		border-radius:5px;
		margin-bottom:10px;
	}
</style>
</head>
<body> 
<a href="order_details.php"><h1>cart</h1></a>
<?php
 
	$query = mysqli_query($connect, "SELECT * FROM `users` WHERE `id`='$_SESSION[id]'") or die(mysqli_error());
	$fetch = mysqli_fetch_array($query);
	echo "<h2>".$fetch['email']."</h2>";
?>

			<?php
			$result = mysqli_query($connect, "select * from product where product_isDelete=0");	
	        while($row = mysqli_fetch_assoc($result))
			{
				?>		
				<div id="main-container">
					<div id="box1" style="margin-left:10px">
					<p><img src="<?php print $product['product_image']?>" width="50"></p>
						<p><?php echo $row["product_name"]; ?></p>
						<p>RM<?php echo $row["product_price"]; ?></p>
						<p><a href="purchase.php?buy&procode=<?php echo $row['product_code']; ?>">Buy Now</a></p>
					</div>
				</div>
				<?php				
			}		
			?>
</body>
</html>

