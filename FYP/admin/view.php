<?php include("dataconnection.php"); ?>

<!DOCTYPE html>
<html>
<head>
<title>View</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
td{
	text-align: center;
}
</style>
</head>
<body class="w3-light-grey">

<?php require("header.php"); ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b>View</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom" style="margin-left:50px">
<table border="1" width="650px">
    <tr>

		 <th>Image</th>
		 <th>Product Name</th>	
     <th>Price</th>						
		 <th>Quantity</th>
     <th>Color</th>						

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
					<td><img src="../images/<?php print $row['product_image']?>" width="100" height="auto"></td>
          <td><?php echo $row["product_name"]; ?></td>
					<td><?php echo $row["product_price"]; ?></td>
					<td><?php echo $row["qty"]; ?></td>
          <td><?php echo $row["color"]; ?></td>
				</tr>
				
				<?php
				
				}
			}
	?> 
 </table>

  </div>

  <div class="w3-panel">
    
  </div>
  <hr>

  <div class="w3-container">

  </div>
  <hr>

  <div class="w3-container">
   
  </div>
  <hr>

  <div class="w3-container">
     
  </div>
  <hr>

  <div class="w3-container">
    
  </div>
  <br>

  <div class="w3-container w3-padding-32">
     
  </div>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>