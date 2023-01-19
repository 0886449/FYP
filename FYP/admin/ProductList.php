<?php include("dataconnection.php"); ?>

<!DOCTYPE html>
<html>
<head>
<title>Product List</title>
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

<script type="text/javascript">
	function confirmation()
	{
		answer = confirm("Do you want to delete？");
		return answer;
	}
</script>

	<?php
	//remove product from product list 
	if (isset($_GET["del"])) 
	{
		$product_id = $_GET["product_id"]; 
		//update product table and set product_isDelete to 1
		mysqli_query($connect, "update product set product_isDelete=1 where product_id='$product_id'"); //assign to 1
		
		header( "refresh:0.5; url=ProductList.php" );
		//after delete back to product list
	}
	
	?>	
</head>
<body class="w3-light-grey">

<?php require("header.php"); ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b>Product List</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom" style="margin-left:50px">
  <table border="1" width="650px">
			<a href="addproduct.php">+product</a>
			<tr>
				<th>Product</th>
				<th>Product Name</th>							
				<th>Price</th>
				<th>Stock</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			
			<?php
			
			$result = mysqli_query($connect, "select * from product where product_isDelete=0" );	//select attributes from 2 tables
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
					<td><img src="../images/<?php print $row['product_image']?>" width="100" height="auto"></td>
					<td><?php echo $row["product_name"]; ?></td>
					<td><?php echo $row["product_price"]; ?></td>
					<td><?php echo $row["product_stock"]; ?></td>
					<td><a href="ProductEdit.php?edit&product_id=<?php echo $row['product_id']; ?>">Edit</a></td>
					<td><a href="ProductList.php?del&product_id=<?php echo $row['product_id']; ?>" onclick="return confirmation();">Delete</a></td>
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