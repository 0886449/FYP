<?php include("dataconnection.php");
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
	<title>Check out</title>
</head>
<body>
<?php
	$query = mysqli_query($connect, "SELECT * FROM `users` WHERE `id`='$_SESSION[id]'") or die(mysqli_error());
	$fetch = mysqli_fetch_array($query);
	$row = mysqli_fetch_assoc($query);
?>
<a href="inde.php"><h1>cart</h1></a>
<form name="addnewfrm" method="post" action="">

 
		<table border="1" width="650px">
			<tr>
				<th>Purchase Id</th>
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
					<td><?php echo $row["product_name"]; ?></td>
					<td><?php echo $row["purchase_quantity"]; ?></td>
					<td><?php echo number_format($pay,2); ?></td>
					<?php $total += $pay;?>
				</tr>
				
				<?php
				
				}
			}
			
			?>
		</table>
		<p><h4>Total:RM<?php echo number_format($total,2)?></h4></p>

		<div> 
            <label for="fname"><i class=""></i> Full Name</label>
            <input type="text" id="fname" name="fname" >

            <label for="email"><i class=""></i> Email</label>
            <input type="text" id="email" name="email" placeholder="xx@example.com">

			<label for="phone"><i class=""></i> Phone Number</label>
            <input type="text" id="phone" name="phone">

            <label for="address"><i class=""></i> Address</label>
            <input type="text" id="address" name="address"> 
        </div>
        <div class="">
            <h3>Payment</h3>
            <label for="cname">Card Holder Name</label>
            <input type="text" id="cname" name="cname" placeholder="">

            <label for="cnum">Card Number</label>
            <input type="text" id="cnum" name="cnum" placeholder="xxxx-xxxx-xxxx-xxxx">
            
			<label for="expt">Expiration</label>	
            <input type="text" id="expt" name="expt" placeholder="xxxx">

            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" placeholder="xxx">
        </div>
		<p><input type="submit" name="savebtn" value="PAID">
		</form>	

</body>
</html>

<?php
if (isset($_POST["savebtn"])) 	
{
	$pname = $_POST["fname"];  	
	$pemail = $_POST["email"];  	
	$pphone = $_POST["phone"];  
	$paddress = $_POST["address"];
	$pcname = $_POST["cname"];
	$pcnum = $_POST["cnum"];
	$pexpt = $_POST["expt"];
	$pcvv = $_POST["cvv"];
	$a = $row["purchase_id"]; 
	$custid = $fetch["id"];     

	$result = mysqli_query($connect,"SELECT * from orders where fname = '$pname'" );
	$count=mysqli_num_rows($result);

	if ($count != 0){
		?>
			<script type = "text/javascript">
				alert("0Errors");
			</script>
		<?php
	}
	else{
		//insert into database
		mysqli_query($connect,"INSERT INTO orders (fname, email,phone, address, cname, cnum, expt, cvv, orderpurchase_id, cid) 
					VALUES('$pname','$pemail','$pphone','$paddress','$pcname','$pcnum','$pexpt','$pcvv','$a','$custid')");				 
		?>
			<script type="text/javascript">
				alert("Sucessfull");
			</script>
			echo "<script>window.location='done.php'</script>";
		<?php
	}
}	
?>