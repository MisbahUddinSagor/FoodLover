<?php
	require_once('db/connect.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="img/fav.png" type="image/gif" />
<title>FW | Order</title>
<!-- CSS -->
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/topmenu.css" rel="stylesheet" type="text/css">

	
<!-- JS -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scrollup.js"></script>
</head>

<body>
     <header class="header_home_p">
		 <?php require_once('menu_top.php'); ?>
	</header>
	<br>
	<div class="continer">
		<div class="row">
			<div class="col-md-3">
			</div>
			<div class="col-md-6">
				
				
				
				<div class="simple_form margin_top_50">
					<h2 align="center">Order Now</h2>
					<br>
					<?php 
					date_default_timezone_set("Asia/Dhaka");
					
					if (loggedin() ) {
					echo '<h3 align="center">Welcome '.$FirstName.' '.$LastName.'! <small><small><a href="Signout.php"> Sign Out</a></small></small></h3>';
					} else {
						
					}
					
					?>
					
					<?php
						
					
						if(isset($_POST['submit'])){
							$product_id = $_POST['product_id'];
							$customer_name = $_POST['customer_name'];
							$customer_address = nl2br(htmlentities($_POST['customer_address'], ENT_QUOTES));
							$customer_email = $_POST['customer_email'];
							$customer_phone = $_POST['customer_phone'];
							$restaurant_name = $_POST['restaurant_name'];
							$order_amount = $_POST['order_amount'];
													
							$query = mysql_query("INSERT INTO `order_table`( `restaurant_name`, `product_id`, `customer_name`, `Customer_address`, `email`, `phone`, `date`, `order_amount`) VALUES ('$restaurant_name', '$product_id', '$customer_name', '$customer_address', '$customer_email', '$customer_phone', now(), '$order_amount')");
							 
							
							if($query){
								//$dt = date("m/d/Y h:i:s a", strtotime("+4 hours")
								
								$new_id = mysql_insert_id();
								$query = mysql_query("SELECT * FROM `product` WHERE product_id = '$product_id'");
								while($rows = mysql_fetch_array($query)){
									$product_name = $rows['product_name'];
									$product_discount_f = $rows['product_discount'];
									$product_price_d = $rows['product_price'];
									$product_price_p = $product_price_d*$order_amount;
									$product_discount =($product_price_p*$product_discount_f)/100;
									$total = $product_price_p - $product_discount;
																		
									if(loggedin()){							
										$product_price = $total - ($total*.04);
								} else {
									$product_price = $total;
							}
									$vat = $product_price*.15;
									$grand_total = $product_price+$vat;
																		
									
									$query = mysql_query("INSERT INTO `delivery`(`delivery_id`, `order_id`, `customer_name`, `product_name`, `product_price`, `product_discount`, `total`, `vat`, `grand_total`, `date`) VALUES ('$delivery_id','$new_id','$customer_name','$product_name','$product_price_p','$product_discount','$total','$vat','$grand_total','$dt')");	
						}
																		
								echo '<h2 align="center" style="color: green;">Order Complete Successfully</h2>'; 
								echo ("<script LANGUAGE='JavaScript'>
										window.alert('Order Complete Successfully. You have to pay $grand_total Taka');
										window.location.href='search restaurant.php';
										</script>");
							
						} else {
								echo '<h2 align="center" style="color: #f00;">Submit Error</h2>';
								
							}
						} else {
							echo mysql_error();
						}							
					?>
					
					
					
					<form method="post" action="">
						<input name="product_id" required="required" class="form-control" placeholder="Enter Item Number" type="text" value="<?php echo @$product_id; ?>">
						<br>
						<input name="restaurant_name" required="required" class="form-control" placeholder="Enter Restaurant_name" type="text" value="<?php echo @$product_id; ?>">
						<br>
						
						<input name="customer_name" required="required" class="form-control" placeholder="Enter Your Name" type="text" value="<?php echo @$product_id; ?>">
						<br>
						
						<textarea name="customer_address" required="required" class="form-control" placeholder="Enter Your Address" type="text" value="<?php echo @$product_id; ?>"></textarea>
						<br>
						<input name="customer_email" required="required" class="form-control" placeholder="Enter Your Email" type="text" value="<?php echo @$product_id; ?>">
						<br>
						<input name="customer_phone" required="required" class="form-control" placeholder="Enter Your Number" type="text" value="<?php echo @$product_id; ?>">
						<br>
						<input name="order_amount" required="required" class="form-control" placeholder="Enter amount" type="text" value="<?php echo @$product_amount; ?>">
						
						<br><br>
						<input type="submit" name="submit" value="Order" id="butt" class="btn btn-dark">
						
					</form>
				</div>
			</div>
		
			<div class="col-md-3">
			</div>
		</div>
	</div>
	
	<br>
	<?php require_once('footer.php'); ?>
</body>
</html>