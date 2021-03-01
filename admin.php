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
				<a href="add.php"class="btn btn-light">Add Item</a>
				<a href="delete.php"class="btn btn-light">Delete Item</a>
			</div>
		
			<div class="col-md-3">
			</div>
		</div>
	</div>
	
	<br>
	<?php require_once('footer.php'); ?>
</body>
</html>