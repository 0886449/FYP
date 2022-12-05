<?php include("dataconnection.php"); ?>
<?php
	session_start();
	if(!ISSET($_SESSION['id'])){
		header('location:login.php');
	}
?>
<?php
			$query = mysqli_query($connect, "SELECT * FROM `users` WHERE `id`='$_SESSION[id]'") or die(mysqli_error());
			$fetch = mysqli_fetch_array($query);
			$row = mysqli_fetch_assoc($query);

?>
<html>
<head>
 
</head>
<body>
		<?php
		    if(isset($_REQUEST["buy"]))
			{
				$pcode = $_GET["procode"];
	
				$result = mysqli_query($connect, "select * from product where product_code = '$pcode'");
				$row = mysqli_fetch_assoc($result);
			}
		?>
 
		
		<h1>Confirm</h1>
		
		<p>
		<br>Product Image :<?php echo $row['product_image']; ?>	
		<br>Product Name : <?php echo $row['product_name']; ?>
		<br>Product Price : <?php echo $row['product_price']; ?>
		<p>Email:<input type="text" name="cust_name" value="<?php echo $fetch['email'];?>" disabled></p>
		<form name="purchasefrm" method="post" action="">
			<p>Quantity:<input type="text" name="cust_qty" ></p>
			<p><input type="submit" name="orderbtn" value="Add to cart">
		</form>
		</p>
		
	
</body>
</html>
 
<?php
 
if (isset($_POST["orderbtn"])) 	
{
	$cname = $_POST["email"]; //retrive value from purchasefrm	 	
	$cqty = $_POST["cust_qty"]; //retrive value from purchasefrm
	$pprice = $row["product_price"]; //get product_price 
	$balance = $row["product_stock"] - $cqty;
	
	//if($row['product_stock'] >= $cqty)
	if($balance>=0)
	{

		mysqli_query($connect,"insert into purchase (purchase_name, purchase_quantity, purchase_product_price, purchase_product_code) values ('$cname',$cqty,$pprice,'$pcode')");//insert data into purchase table
 
		mysqli_query($connect,"UPDATE product SET product_stock='$balance' where product_code='$pcode'");// update product table
		
		header("location:productlist.php");
	}
	else
	{	//display alert box
		?>
			
			<script type="text/javascript">
				alert("Your quantity is more than the stock that we have. Please change.");
			</script>	
		<?php
	}
	
}
 
?>