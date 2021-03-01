<?php
	require_once('db/connect.php');
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta charset="utf-8">
	<link rel="shortcut icon" href="img/fav.png" type="image/gif" />
	<title>Search Result</title>
	<!-- CSS -->
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/topmenu.css" rel="stylesheet" type="text/css">
	<link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />

	<!-- JS -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/scrollup.js"></script>
	<script src="themes/1/js-image-slider.js" type="text/javascript"></script>
	
</head>

<body>
	 <header class="header_home_p">
		 <?php require_once('menu_top.php'); ?>
	</header>
	<br>
	<div class="wel"><h2>Welcome</h2>
        <p>
    </div>
    <div id="sliderFrame">
        <div id="slider">
		
	        <img src="img/appeliano.jpg" alt="Cafe Appeliano" />	
            <img src="img/Cafe_Theater.jpg" alt="Cafe Theater" />
            <img src="img/grind_house.jpg" alt="Grind House" />
            <img src="img/T&T.jpg" alt="Tune & Bite"/>
			<img src="img/TBD.jpg" alt="TraditionBD" />
 	   </div>
        <div id="htmlcaption" style="display: none;">
        </div>
    </div>
	
	<br>
	<br>
		

    <div class="div2">
    </div>
	<?php
		if(isset($_GET['submit'])){
			$area = $_GET['area'];
			?>
	<div class="container big_logo">
		<h2 align="center">Restaurants Available in <?php echo $area; ?> Zone</h2>
		<div class="row">
			<div class="card-deck">
			
			<?php
			$query = mysql_query("SELECT * FROM restaurant WHERE area_name = '$area'");
			
			while($row = mysql_fetch_array($query)){
				$r_id = $row['r_id'];
				$r_name=$row['restaurant_name'];
				$r_mail=$row['email'];
				$r_phn=$row['phone'];
				$r_rating=$row['rat_rating'];
				$address=$row['address'];
				$r_image=$row['r_image'];
				?>
			
			
				<div class="card">
					<img class="card-img-top" src="img/<?php echo $r_image; ?>">
					<div class="card-block">
						<a href="#"><h4 class="card-title"><?php echo $r_name; ?></h4></a>
						<p class="card-text">Area: <?php echo $area; ?></p>
				  		<p class="card-text">Address: <?php echo $address; ?></p>
						<p class="card-text">E-mail: <?php echo $r_mail; ?></p>
						<p class="card-text">Contact: <?php echo $r_phn; ?></p>
				  		<p class="card-text"><small class="text-muted"><?php echo $r_rating; ?></small></p>
						<form method="get" action="product.php">
							<input type="hidden" name="res_name" value="<?php echo $r_name; ?>">
							<input type="submit" name="submit" value="View" class="btn btn-danger">
						</form>
					</div>
			  	</div>
								
				<?php
					//echo 'Restaurant Name '.$r_name.'<br> '.$address.'<br><br><br>';
			}
		}
	?>			
			
			</div>
			
		</div>
	</div>
	<br>
	
	<?php require_once('footer.php'); ?>
</body>
</html>