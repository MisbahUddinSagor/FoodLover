<?php
	require_once('db/connect.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="img/fav.png" type="image/gif" />
<title>Contact</title>
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
					<h2 align="center">Contact Us</h2>
					<br>
									
					<?php
						
					
						if(isset($_POST['submit'])){
							$name = $_POST['name'];
							$email = $_POST['email'];
							$phone = $_POST['phone'];
							$msg = $_POST['msg'];
							
							$query = mysql_query("INSERT INTO `contact`(`name`, `email`, `phone`, `msg`) VALUES ('$name','$email','$phone','$msg')");
							
							if($query){
								echo ("<script LANGUAGE='JavaScript'>
										window.alert('We will contact you as soon as possible.');
										window.location.href='search restaurant.php';
										</script>");
							}
							else{
								echo ("<script LANGUAGE='JavaScript'>
										window.alert('Error!!! Try Again');
										window.location.href='search restaurant.php';
										</script>");
							}
											
						} else {
							echo mysql_error();
						}							
					?>
					
										
					<form method="post" action="">
						<input name="name" required="required" class="form-control" placeholder="Enter Your Name" type="text" value="<?php echo @$product_id; ?>">
						<br>
						<input name="email" required="required" class="form-control" placeholder="Enter Your E-mail" type="text" value="<?php echo @$product_id; ?>">
						<br>
						
						<input name="phone" required="required" class="form-control" placeholder="Enter Your Contact No" type="text" value="<?php echo @$product_id; ?>">
						<br>
						
						
						<input name="msg" required="required" class="form-control" placeholder="Enter Your Message" type="text" value="<?php echo @$product_id; ?>">
						<br>
												
						<br><br>
						<input type="submit" name="submit" value="Message Now" id="butt" class="btn btn-dark">
						
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