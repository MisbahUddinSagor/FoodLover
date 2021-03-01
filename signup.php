<?php
	require_once('db/connect.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="img/fav.png" type="image/gif" />
<title>FW | Regestration</title>
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
					<h2 align="center">Registiation Form</h2>
					<br>
					
					<?php
						if(isset($_POST['submit'])){
							$fname = $_POST['fname'];
							$lname = $_POST['lname'];
							$address = nl2br(htmlentities($_POST['address'], ENT_QUOTES));
							$email = $_POST['email'];
							$phone = $_POST['phone'];
							$gender = $_POST['gender'];
							$username = $_POST['username'];
							$password = $_POST['password'];
							$con_pass = $_POST['con_pass'];
							$user_level = $_POST['Type'];
							
							$query = mysql_query("SELECT * FROM user_account WHERE UserName = '$username'");
							
							if(!mysql_num_rows($query)){
							
								if($password == $con_pass){
									$query = mysql_query("INSERT INTO `user_account`(`FirstName`, `LastName`, `Address`, `Email`, `Phone`, `Gender`, `UserName`, `Password`, `UserLevel`) VALUES ('$fname', '$lname', '$address', '$email', '$phone', '$gender', '$username', '$password', '$user_level')");
									
									if($query){
										echo '<h2 align="center" style="color: green;">Registiation Successfully</h2>'; 
										
										echo ("<script LANGUAGE='JavaScript'>
										window.alert('Registiation Successfully');
										window.location.href='signin.php';
										</script>");
									} else {
										echo mysql_error();
									}
								} else {
									echo '<h2 align="center" style="color: #f00;">Both password are not match</h2>';
								}
							} else {
								echo '<h2 align="center" style="color: #f00;">Username  allready exist</h2>';
							}
						} else {
							echo mysql_error();
						}
								
							
					?>
					
					
					
					<form method="post" action="">
						<input name="fname" required="required" class="form-control" placeholder="Enter Your First Name" type="text" value="<?php echo @$fname; ?>">
						<br>
						<input name="lname" required="required" class="form-control" placeholder="Enter Your Last Name" type="text" value="<?php echo @$lname; ?>">
						<br>
						<textarea name="address" required="required" class="form-control" placeholder="Enter Your Address" value="<?php echo @$address; ?>"></textarea>
						<br>
						<input name="email" required="required" class="form-control" placeholder="Enter Your E-mail" type="email" value="<?php echo @$email; ?>">
						<br>
						<input type="tel" required="required" name="phone" placeholder="Enter Your Mobile Number" class="form-control" value="<?php echo @$phone; ?>">
						<br>
						<select name="gender" required="required" class="form-control" style="max-width: 150px;">
							<option value="">Seclet Gender</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="Others">Otrers</option>						
						</select>
						<br>
						<select name="Type" required="required" class="form-control" style="max-width: 150px;">
							<option value="">Seclet Type</option>
							<option value="admin">Admin</option>
							<option value="User">User</option>			
						</select>
						<br>
					  	<input type="text" required="required" name="username" placeholder="Enter Username or, E-mail" class="form-control">
						<br>
						<input type="password" required="required" name="password" placeholder="Enter Your Password" class="form-control">
						<br>
						<input type="password" required="required" name="con_pass" placeholder="Confirm Password" class="form-control">
						<br><br>
						<input type="submit" name="submit" value="Register" id="butt" class="btn btn-dark">
						<p>
  							Already a member? <a href="signin.php">Sign in</a>
  						</p>
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