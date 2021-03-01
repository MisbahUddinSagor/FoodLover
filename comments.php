<?php
	require_once('db/connect.php');
?>

<!doctype html>
<html><head>
<meta charset="utf-8">
<link rel="shortcut icon" href="img/fav.png" type="image/gif" />
<title>Food World</title>
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
     <header class="header">
		 <?php require_once('menu_top.php'); ?>
	 </header>
	<br>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12 white_tp_bg_padding">
				
				<h2>All Comments</h2>
				<?php
				$query = mysql_query("SELECT * FROM `comment` ORDER BY `c_id` DESC");
				
				if(!empty($query)) {
					while($rows = mysql_fetch_array($query)) {
						$c_name = $rows['c_name'];
						$c_date_f = $rows['c_date'];
							$Inv_Date1 = strtotime($c_date_f);		
							$c_date = date("d F Y, h:i:s a", $Inv_Date1);
						$comment = $rows['comment'];
						$rating = $rows['rating'];
						
						?>
						<strong style="color: #137600">By: <?php echo $c_name; ?></strong> <br>
						<small style="color: #666"><?php echo $c_date; ?></small>  <br>
						<strong>Comment: </strong> <?php echo $comment; ?> <hr>
				
						<?php

					}
					
				}
				?>
				
				<?php
				$dt = date('d M Y, h:i:s a');
				if(isset($_POST['comment_post'])) {
					$name = $_POST['name'];
					$p_comment = mysql_real_escape_string($_POST['comment']);
					$rating = $_POST['rate'];
					
					$query = mysql_query("INSERT INTO `comment`(`c_name`, `c_date`, `comment`, `rating`) VALUES ('$name', NOW(), '$p_comment', '$rating')");
					
					if($query) {
						
						echo '<script type="text/javascript">';
						echo 'alert("Comment Post Successfully!");';
                    	echo 'window.location.href = "index.php?#comment_r";';
                    	echo '</script>';
						
					} else {
						echo mysql_error();
					}
				} else {
					echo mysql_error();
				}
				?>
				
				<hr>
				<h2>Leave Your Comment</h2>
				<form method="post" action="#">
					<div class="form-group">
						<label>Name:</label>
						<input type="text" name="name" placeholder="Your Name" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Comment:</label>
						<textarea name="comment" placeholder="Your Comment" rows="5" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Rate this site:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						 <label class="radio-inline"><input type="radio" name="rate" value="1"> 1</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<label class="radio-inline"><input type="radio" name="rate" value="2"> 2</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<label class="radio-inline"><input type="radio" name="rate" value="3"> 3</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<label class="radio-inline"><input type="radio" name="rate" value="4"> 4</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<label class="radio-inline"><input type="radio" name="rate" value="5" checked> 5</label> 
					</div>
					<input type="submit" name="comment_post" value="Post Comment" class="btn btn-dark">
				</form>
			</div>
		</div>
	</div>
	<br>
	<?php require_once('footer.php'); ?>

	
</body>


</html>