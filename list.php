<?php include("dataconnection.php"); ?>

<html>
<head>
<link href="register.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>List</title>
</head>
 
<script type="text/javascript">
 
function confirmation()
{
	answer = confirm("Do you want to delete this user?");
	return answer;
}
 
</script>
 
<body>
		<h1>User</h1>
 
		<table border="1" width="650px">
			<tr>
				<th>#</th>
				<th>Name</th>	
                <th>Email </th>	
                <th>Phone number</th>	
                <th>Gender</th>
				<th colspan="2">Action</th>
			</tr>
			
			<?php			
			$result = mysqli_query($connect, "select * from users where user_isDelete=0");	
	        while($row = mysqli_fetch_assoc($result))
			{
				
				?>			
 
				<tr>
					<td><?php echo $row["id"]; ?></td>
					<td><?php echo $row["username"]; ?></td>
					<td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["phone_number"]; ?></td>
                    <td><?php echo $row["gender"]; ?></td>
					<td><a href="edit.php?edit&id=<?php echo $row['id']; ?>">Edit</a></td>
					<td><a href="list.php?del&id=<?php echo $row['id']; ?>" onclick="return confirmation();">Delete</a></td>
				</tr>
				<?php
				
			}		
			
			?>
		</table>
 
 
</body>
</html>

<?php
//remove product from product list 
if (isset($_GET["del"])) 
{
	$pcode = $_GET["procode"]; 
	//update product table and set product_isDelete to 1
	mysqli_query($connect, "update product set product_isDelete=1 where product_code='$pcode'");
	
	header("Location:productlist.php");
}
 
?>