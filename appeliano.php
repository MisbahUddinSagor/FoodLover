<?php
	require_once('db/connect.php');
	
?>

<?php 
    
    if(isset($_GET['page'])){ 
          
        $pages=array("product", "cart"); 
          
        if(in_array($_GET['page'], $pages)) { 
              
            $_page=$_GET['page']; 
              
        }else{ 
              
            $_page="product"; 
              
        } 
          
    }else{ 
          
        $_page="product"; 
          
    } 
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta charset="utf-8">
	<link rel="shortcut icon" href="img/fav.png" type="image/gif" />
	<title>Appeliano</title>
	<!-- CSS -->
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/topmenu.css" rel="stylesheet" type="text/css">
	<link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/reset.css" /> 

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
	
	 <div id="container"> 
  
        <div id="main"> 
			<?php require($_page.".php"); ?>
              
        </div><!--end main-->
          
        <div id="sidebar"> 
			<h1>Cart</h1> 
			
			<?php 
  
    if(isset($_SESSION['cart'])){ 
          
        $sql="SELECT * FROM product WHERE product_id IN ("; 
          
        foreach($_SESSION['cart'] as $id => $value) { 
            $sql.=$id.","; 
        } 
          
        $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
        $query=mysql_query($sql); 
        while($row=mysql_fetch_array($query)){ 
              
        ?> 
            <p><?php echo $row['product_name'] ?> x <?php echo $_SESSION['cart'][$row['product_id']]['quantity'] ?></p> 
        <?php 
              
        } 
    ?> 
        <hr /> 
        <a href="cart.php">Go to cart</a> 
    <?php 
          
    }else{ 
          
        echo "<p>Your Cart is empty. Please add some products.</p>"; 
          
    } 
  
?>
              
        </div><!--end sidebar-->
  
    </div><!--end container-->
		
</body>
</html>