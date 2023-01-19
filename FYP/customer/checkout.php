<?php include("dataconnection.php");
$total=0;
session_start();
	if(!ISSET($_SESSION['id'])){
		header('location:login.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Check Out</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>

<form name="addnewfrm" method="post" action="">
<?php
$query = mysqli_query($connect, "SELECT * FROM `users` WHERE `id`='$_SESSION[id]'");
$fetch = mysqli_fetch_array($query);
$row = mysqli_fetch_assoc($query);
?>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="fname" placeholder=""  minlength="4" maxlength="30" pattern="[A-Z a-z]{4,30}" required>
           
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder=""  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
           
            <label for="city"><i class="fa fa-institution"></i>Phone Number</label>
            <input type="text" id="phone" name="phone" placeholder="" pattern="[0][1][0-9][0-9]{7,8}" required>
           
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <textarea id="adr" name="address" placeholder="" rows="4" cols="67" required></textarea>
           
            <div class="row">
              <div class="col-50">
                <!--<label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">-->
              </div>
              <div class="col-50">
                <!--<label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">-->
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="" minlength="4" maxlength="15" pattern="[A-za-z ]{4,30}" required>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" required>
            <label for="expmonth">Exp Month/Year:</label>
            <input type="text" id="expmonth" name="exp" placeholder="xx/xx" pattern="(0[1-9]|1[0-2])/[2][3-9]" required>
            <div class="row">
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="xxx" pattern="[0-9]{3}" minlength="3" maxlength="3" required>
              </div>
            </div>
          </div>
          
        </div>
        
        <input type="submit" name="savebtn" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b></b></span></h4>
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
			else{
      
				while($row = mysqli_fetch_assoc($result))
				{
					$pay = $row["purchase_product_price"] * $row["purchase_quantity"]; //calculate payment for each purchase
          ?>			
  
          <tr>
            <p><?php echo $row["product_name"]; ?> <span class="price">RM<?php echo number_format($pay,2); ?></span></p>
            <?php 
            $total += $pay;
            $qtty = $row["purchase_quantity"];
            ?>
          </tr>
          <?php
				}
			}
			
			?>
      <hr>
      <p>Total <span class="price" style="color:black"><b>RM<?php echo number_format($total,2); ?></b></span></p>
    </div>
  </div>
</div>
</form>

</body>
</html>

<?php
if (isset($_POST["savebtn"])) 	
{
	$fname = $_POST["fname"];  	
	$email = $_POST["email"];  	
	$phone = $_POST["phone"];  
	$address = $_POST["address"];

	$cardname = $_POST["cardname"];
	$cardnumber = $_POST["cardnumber"];
	$exp = $_POST["exp"];
	$cvv = $_POST["cvv"];

	$custid = $fetch["id"];  
	$totprice = $total;        

  //insert into database
  $result=mysqli_query($connect,"INSERT INTO orders (fname, email,phone, address, cname, cnum, expt, cvv, cid, totalprice) 
  VALUES('$fname','$email','$phone','$address','$cardname','$cardnumber','$exp','$cvv','$custid','$totprice')");

  $order_id = mysqli_insert_id($connect);

  $result = mysqli_query($connect, "select * from product,purchase where purchase_product_code = product_code");	//select attributes from 2 tables
  $count = mysqli_num_rows($result);
  if ($count < 1)
  {
  ?>
      <script type="text/javascript">
      alert("No record");
      </script>
      <?php
  }
  else
  {
  while($row = mysqli_fetch_assoc($result))
  {
  $c = $row["product_id"];
  $d = $row["purchase_quantity"];
  $e = $row["purchase_product_price"];
  $color =  $row["purchase_color"];

  $query = mysqli_query($connect,"INSERT INTO order_items (orders_id, prod_id, qty, price, color) 
  VALUES('$order_id','$c','$d','$e', '$color')");
  ?>		
  <?php

  }
  }			 
  ?>
  <script type="text/javascript">
  alert("Sucessfull");
  </script>
  echo "<script>window.location='done.php'</script>";
<?php
}	
?>
