<?php include("dataconnection.php"); 
$total=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        body {
        	margin-top: 50px;
			margin-left: 360px;
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
	if (isset($_REQUEST["del"])) 
	{
		$purchid = $_REQUEST["purchase_id"]; 

		mysqli_query($connect, "delete from purchase where purchase_id = $purchid");
		header("Location: cart.php");
	}
	
	?>	

</head>
<body>
    
<div class="container">
	<div class="row">
		<div class="col-xs-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-6">
								<h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
							</div>
							<div class="col-xs-6">
								<button type="button" class="btn btn-primary btn-sm btn-block">
									<a class="glyphicon glyphicon-share-alt" href="cloth.php"></a> Continue shopping
								</button>
							</div>
						</div>
					</div>
				</div>
                <?php
			
                    $result = mysqli_query($connect, "select * from product,purchase where purchase_product_code = product_code" );	//select attributes from 2 tables
                    $count = mysqli_num_rows($result);
                    if ($count < 1){
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

							<div class="panel-body">
								<div class="row">
									<div class="col-xs-2">
										<img class="img-responsive" src="../images/<?php print $row['product_image']?>" width="100" height="auto">
									</div>
									<div class="col-xs-4">
										<h4 class="product-name"><strong><?php echo $row['product_name']; ?></strong></h4><h4><small><?php echo $row['purchase_color']; ?></small></h4>
									</div>
										<div class="col-xs-6">
											<div class="col-xs-6 text-right">
												<h6><strong><?php echo $row['product_price']; ?><span class="text-muted"> x</span></strong></h6>
											</div>
											<div class="col-xs-4">
												<input type="text" class="form-control input-sm" value="<?php echo $row["purchase_quantity"]; ?>"disabled>
											</div>
											<?php $total += $pay;?>

											<div class="col-xs-2">
												<button type="button" class="btn btn-link btn-xs">
													<a class="glyphicon glyphicon-trash" href="cart.php?del&purchase_id=<?php echo $row['purchase_id']; ?>" onclick="return confirmation();"> </a>
												</button>
											</div>
										</div>
									</div>
								<hr>	
							</div>
			
                			<?php
                            
                        }
                        ?>
                    
				<div class="panel-footer">
					<div class="row text-center">
						<div class="col-xs-9">
							<h4 class="text-right">Total RM<strong><?php echo number_format($total,2)?></strong></h4>
						</div>
						<div class="col-xs-3">
							<button type="button" class="btn btn-success btn-block">
								<a href="checkout.php" style="color: white;">Checkout </a>  
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
				<?php
					}
				?>
</body>
</html>