<?php include("dataconnection.php"); ?>
<?php
	session_start();
	if(!ISSET($_SESSION['id'])){
		header('location:login.php');
	}
?>
<!DOCTYPE html>
<html>
<title>Order Details</title>
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
<h1>List of Orders Details</h1>
 
 <table border="1" width="650px">
	 <tr>
		 <th>Purchase Id</th>
		 <th>Customer Name</th>							
		 <th>Payment (RM)</th>
		 <th>Date</th>
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
			 <td style="text-align: center;"><?php echo $row["orderid"]; ?></td>
			 <td style="text-align: center;"><?php echo $row["fname"]; ?></td>							
			 <td style="text-align: center;"><?php echo $row["totalprice"]; ?></td>
			 <td style="text-align: center;"><?php echo $row["order_date"]; ?></td>						
			 <td style="text-align: center;"><a href="view.php?viewd&orderid=<?php echo $row['orderid']; ?>">View</a></td>
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
