<?php include("dataconnection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Order</title>
	<link href="design.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div id="wrapper">
		<div id="left">
			<?php include("menu.php"); ?>
		</div>
		<div id="right">
		<table border="1" width="650px">
			<tr>
                <th>Customer Name</th>							
                <th>Payment (RM)</th>
                <th>View</th>   
			</tr>
			
			<?php
			
            $result = mysqli_query($connect, "select * from orders");	//select attributes from 2 tables
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
                    <td><?php echo $row["fname"]; ?></td>							
                    <td><?php echo $row["totalprice"]; ?></td>			
                    <td><a href="view.php?viewd&orderid=<?php echo $row['orderid']; ?>">View</a></td>
                </tr>
                
                <?php
                
                }
            }
			
			?>
		</table>
		</div>
	</div>

</body>
</html>

<?php
if (isset($_REQUEST["del"])) 
{
	$purchid = $_REQUEST["purchase_id"]; 
	mysqli_query($connect, "delete from purchase where purchase_id = $purchid");
	
	header("Location: order_details.php");
}
 
?>

