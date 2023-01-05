<?php include("dataconnection.php"); ?>
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
	<title>Order Details</title>
</head>
<body>
<h1>List of Orders Details</h1>
 
 <table border="1" width="650px">
	 <tr>
		 <th>Purchase Id</th>
		 <th>Customer Name</th>							
		 <th>Payment (RM)</th>
		 <th>View</th>
	 </tr>
	 
	 <?php
	 
	 $result = mysqli_query($connect, "select * from orders where cid = '$_SESSION[id]'");	//select attributes from 2 tables
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
		 ?>			

		 <tr>
			 <td><?php echo $row["orderid"]; ?></td>
			 <td><?php echo $row["fname"]; ?></td>							
			 <td><?php echo $row["totalprice"]; ?></td>			
			 <td><a href="view.php?viewd&orderid=<?php echo $row['orderid']; ?>">View</a></td>
		 </tr>
		 
		 <?php
		 
		 }
	 }
	 
	 ?>
 </table>
</body>
</html>