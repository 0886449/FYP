<?php include("dataconnection.php"); ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
		<h1>Shopping Cart</h1>
		<p>
		<br>Product Image : <?php echo $row['product_image']; ?>
		<br>Product Name : <?php echo $row['product_name']; ?>
		<br>Product Price : <?php echo $row['product_price']; ?>
		</p>
		<form name="purchasefrm" method="post" action="">
 
			<p><input type="submit" name="orderbtn" value="Check Out">
 
		</form>
	
</body>
</html>
 
<?php
 
if (isset($_POST["orderbtn"])) 	
{
	$cname = $_POST["cust_name"]; //retrive value from purchasefrm	 	
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