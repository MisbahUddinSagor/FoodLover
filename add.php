<?php
	require_once('db/connect.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="img/fav.png" type="image/gif" />
<title>FW | ADMIN PANEL</title>
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
					<h2 align="center">ADD ITEM</h2>
					<br>
					
					<?php
						if(isset($_POST['submit'])){
                            $pid = $_POST['pid'];
                            $rname = $_POST['rname'];
							$rid = $_POST['rid'];
							$pname =$_POST['pname'];
							$pprice = $_POST['pprice'];
							$pdis = $_POST['pdis'];			
							$pphoto = $_POST['pphoto'];
							
							$query = mysql_query("SELECT * FROM product WHERE product.restaurant_name = '$rname'");
							
							if(mysql_num_rows($query)){
							
									$query = mysql_query("INSERT INTO product (product_id,restaurant_name,restaurant_id,product_name,product_price,product_discount,product_photo) VALUES ($pid,'$rname', '$rid', '$pname',$pprice,$pdis, '$pphoto')");
									
									if($query){
										echo '<h2 align="center" style="color: green;">Congo!!!! Product Added Successfully</h2>'; 
										
										echo ("<script LANGUAGE='JavaScript'>
										window.alert('Congo!!!! Product Added Successfully');
										window.location.href='signin.php';
										</script>");
									} else {
										echo mysql_error();
									}
							} else {
								echo mysql_error();
							}
						} else {
							echo mysql_error();
						}
								
							
					?>
					
					
					
					<form method="post" action="">
                    <input name="pid" required="required" class="form-control" placeholder="Product ID" type="integer">
						<br>
						<input name="rname" required="required" class="form-control" placeholder="Restaurant Name" type="text">
						<br>
						<input name="rid" required="required" class="form-control" placeholder="Restaurant ID" type="text">
						<br>
						<input name="pname" required="required" class="form-control" placeholder="Product Name">
						<br>
						<input name="pprice" required="required" class="form-control" placeholder="Product Price" type="integer">
						<br>
						<input type="integer" required="required" name="pdis" placeholder="Product Discount" class="form-control">
						<br>
						
						<br>
					  	<input type="text" required="required" name="pphoto" placeholder="Photo" class="form-control">
						<br>
						<input type="submit" name="submit" value="Add" id="butt" class="btn btn-dark">
						
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