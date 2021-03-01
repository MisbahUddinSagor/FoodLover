<?php
	require_once('db/connect.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="img/fav.png" type="image/gif" />
<title>FW | Search Restaurant</title>
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
	<br><br>
	<div class="container big_logo margin_top_20 bg_w_tp">
		<div class="row">
			<div class="col-md-12">
				
				
				
				
					<h2 align="center">Search Restaurant</h2>
					
							
					
					
					<?php 

					if (loggedin()) {
						if($UserLevel=='User') echo '<h3 align="center">Welcome '.$FirstName.' '.$LastName.'! <small><small><a href="Signout.php"> Sign Out</a></small></small></h3>';
						else echo '<h3 align="center">Welcome Admin '.$FirstName.' '.$LastName.'! <small><small><a href="Signout.php"> Sign Out</a></small></small></h3>';
					} else {
						echo '<h3 align="center">Welcome Guest!</h3>';
					}
					
					?>
				<div class="search_r_bg">
					<form method="get" action="search restaurant result.php">
						<div class="input-group">
							<select name="area" class="form-control">
								<option value="">Select Your Location</option>
								<option value="Gulshan">Gulshan</option>
								<option value="Banani">Banani</option>
								<option value="Uttara">Uttara</option>
								<option value="Dhanmondi">Dhanmondi</option>
								<option value="Khilgaon">Khilgaon</option>
							</select>
							&nbsp;
							<input type="submit" name="submit" value="search" class="btn btn-dark">
						</div>
					</form>
				</div>
						
				<div style="height: 300px;"></div>
					
			</div>
			
		</div>
	</div>
	<div style="height: 300px;"></div>
	<br>
	<?php require_once('footer.php'); ?>
</body>
</html>