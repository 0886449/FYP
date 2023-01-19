<?php include("dataconnection.php"); ?>
<?php
	session_start();
	if(!ISSET($_SESSION['id'])){
		header('location:login.php');
	}
?>
<!DOCTYPE html>
<html>
<title>Padini Online System</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="style.css">
<style>
html,body,h1,h2,h3,h4 {font-family:"Lato", sans-serif}
.mySlides {display:none}
.w3-tag, .fa {cursor:pointer}
.w3-tag {height:15px;width:15px;padding:0;margin-top:6px}
</style>

<body>

	<?php require("header.php"); ?>
<div style="margin-top: 80px; margin-left:10px">
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
					<td style="text-align: center;"><img src="../images/<?php print $row['product_image']?>" width="100" height="auto"></td>
                    <td style="text-align: center;"><?php echo $row["product_name"]; ?></td>
					<td style="text-align: center;"><?php echo $row["product_price"]; ?></td>
					<td  style="text-align: center;"><?php echo $row["qty"]; ?></td>
					<td  style="text-align: center;"><?php echo $row["color"]; ?></td>

				</tr>
				
				<?php
				
				}
			}
	?> 
 </table>
</div>


<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

</body>
</html>
