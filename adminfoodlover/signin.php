<?php
	require_once('db/connect.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="img/fav.gif" type="image/gif" />
<title>FW | Sign in</title>
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
	<div class="container">
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				
				
				
				<div class="simple_form margin_top_50">
					<h2 align="center">Sign in</h2>
					<br>
					
					
					
					
					<?php 

					if (loggedin() ) {
					header ("location: search restaurant.php");
					exit();
					}

					if (isset ($_POST['Signin'])) {
						$UserName = $_POST['Username_fw'];
						$Password = $_POST['password'];
						@$RememberMe = $_POST['rememberme'];

						if ($UserName && $Password) {
							$SignIn = mysql_query("SELECT * FROM user_account WHERE UserName='$UserName'");

							while ($row = mysql_fetch_assoc($SignIn) ) {
								$tb_password = $row['Password'];
								$User_Name = $row['UserName'];
								$UserLevel = $row['UserLevel'];

								if ($Password==$tb_password) $LognInOk = TRUE;
								else $LognInOk = FALSE;

								if ($LognInOk == TRUE) {

									if ($RememberMe=="on") 
										setcookie("Username_fw", $UserName, time()+5184000);
									else if ($RememberMe=="") 
									$_SESSION['Username_fw']=$UserName;

									header ("location: search restaurant.php");
									exit();

								} else 
								echo "Incorrect UserName or, Password";

							}
						} else
						echo "Please enter User Name and Password";
					} else {
						mysql_error();
					}


					?>
					
					
					<?php //include('errors.php'); ?>
					<form method="post" action="">
						<label>Username</label>
					  	<input type="text" required="required" name="Username_fw" placeholder="Enter Your Username" class="form-control">
						<br>
						<label>Password</label>
						<input type="password" required="required" name="password" placeholder="Enter Your Password" class="form-control">
						<br>
						<input name="rememberme" type="checkbox" /> Remember me
						<br><br>
						<input type="submit" name="Signin" value="Sign in" class="btn btn-dark">
						<br><br>
						<p>
  							<a href="#"><small>Forgot Password</small></a>
  						</p>
						<hr>
						<p>
  							Don't have account ! <a href="signup.php"><small>Create New</small></a>
  						</p>
						
					</form>
				</div>
			</div>
		
			<div class="col-md-4">
			</div>
		</div>
	</div>
	<div style="height: 300px;"></div>
	<br>
	<?php require_once('footer.php'); ?>
</body>
</html>