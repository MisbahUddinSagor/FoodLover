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
			<div class="col-md-12 text-center">
				<!-- Body Add -->
				<?php 

					if (loggedin() ) {
					echo '<h3 align="center">Welcome '.$FirstName.' '.$LastName.'! <br> You get 4% discount ! <small><small><a href="Signout.php"> Sign Out</a></small></small></h3>';
					} else {
						echo '<h3 align="center">Welcome Guest!<br><small> You don\'t have any discount!<br> Please <a href="signin.php">Signin</a> for 4% Discount</small></h3>';
					}
				
				
				
				if(isset($_REQUEST['order'])){
					$o_name = $_REQUEST['o_name'];
					$o_d_address   = nl2br(htmlentities($_REQUEST['o_d_address'], ENT_QUOTES));
					$o_phone = $_REQUEST['o_phone'];
					$o_email = $_REQUEST['o_email'];
					$o_tot_amount = $_REQUEST['subtotal'];
					$o_res_name = $_REQUEST['o_res_name'];
					
					if (loggedin() ) {
						$o_c_id = $UserID;
						$o_dis_amount = $o_tot_amount * .04;
					} else {
						$o_c_id = '';
						$o_dis_amount = 0;
					}
					
					$o_pay_amount = $o_tot_amount - $o_dis_amount;
					
					$o_status = 'Processing';
					
					$query = mysql_query("INSERT INTO `order`(`o_res_name`, `o_c_id`, `o_name`, `o_d_address`, `o_phone`, `o_email`, `o_tot_amount`, `o_dis_amount`, `o_pay_amount`, `o_status`) VALUES ('$o_res_name', '$o_c_id', '$o_name', '$o_d_address', '$o_phone', '$o_email', '$o_tot_amount', '$o_dis_amount', '$o_pay_amount', '$o_status')");
					
					$id = mysql_insert_id();
					
					if($query){
						for($i=0;$i<count($_REQUEST['product_id']);$i++){
							$product_id = $_REQUEST['product_id'][$i];
							$od_item_price = $_REQUEST['price'][$i];
							$od_item_qty = $_REQUEST['quantity'][$i];
							$od_amount = $_REQUEST['amount'][$i];
							$od_o_id = $id;
							
							mysql_query("INSERT INTO `order_detail`(`od_o_id`, `od_item_id`, `od_item_price`, `od_item_qty`, `od_amount`) VALUES ('$od_o_id', '$product_id', '$od_item_price', '$od_item_qty', '$od_amount')");
							
							
							
						}
						
						
								?>
			  <table width="50%" align="center" border="1" cellpadding="5" cellspacing="0">
				
									<tr>
										<td width="60%" align="left" valign="middle">Order ID</td>
										<td width="40%" align="right" valign="middle"><?php echo $od_o_id; ?></td>
									</tr>
									<tr>
										<td align="left" valign="middle">Total Amount</td>
										<td align="right" valign="middle"><?php echo $o_tot_amount; ?></td>
									</tr>
									<tr>
										<td align="left" valign="middle">Discount 
										
										
											<?php
											if (loggedin() ) {
												echo '(4%)';
											}
											
											?>
										</td>
										<td align="right" valign="middle"><?php echo $o_dis_amount; ?></td>
									</tr>
									<tr style="border_top: 3px solid #000;">
										<td align="left" valign="middle">Total Payable Amount</td>
										<td align="right" valign="middle"><?php echo $o_pay_amount; ?></td>
									</tr>
									<tr style="border_top: 3px solid #000;">
									  <td colspan="2" align="center" valign="middle" style="border: none; padding: 10px;">
										<a href="search restaurant.php" class="btn btn-primary">OK</a>
										</td>
			    </tr>
				</table>
				
				<br><br>
				
				
								
								
								<?php
							
					}
					
					
					
				}
				
				
				
				
                        if(isset($_REQUEST['sel'])){
                            $res_name = $_REQUEST['res_name'];
                            ?>
                            
    <hr style="border:1px dashed black">
                <h5 align="center">You are ordering from <?php echo $res_name; ?></h5>
				
				
				<form>
				  <input type="hidden" name="o_res_name" value="<?php echo $res_name; ?>">
				  <table width="70%" align="center" cellpadding="5" cellspacing="5">
						<tr>
							<td width="50%" align="left" valign="top">Name
								<input type="text" name="o_name" value="<?php echo @$FirstName; ?>" required class="form-control">
							</td>
							<td width="50%" rowspan="3" align="left" valign="top">
								Delivery Adderss
							  <textarea name="o_d_address" value="" required class="form-control"><?php echo @strip_tags($Address); ?></textarea>
							</td>
						</tr>
						<tr>
							<td align="left" valign="top">Phone
								<input type="text" name="o_phone" value="<?php echo @$Phone; ?>" required class="form-control">
							</td>
						</tr>
						<tr>
							<td align="left" valign="top">E-mail
								<input type="text" name="o_email" value="<?php echo @$Email; ?>" required class="form-control">
							</td>
						</tr>
					</table>
					<br>
					
                <h4 align="center">Please check quantity</h4>
    <table class="table table-hover">
    	<thead>
    		<tr>
    			<th width="45%">Item Name</th>
    			<th width="15%">Price</th>
    			<th width="10%">Quantity</th>
    			<th width="17%">Amount</th>
    			<th width="10%">Remove</th>
    			<th width="7%"><input type="button"  class="btn btn-primary add1" value="+"></th>
    		</tr>
    	</thead>
    	<tbody class="details">
                            <?php
                            $tot_p = 0;
                            for($i =0; $i < count($_REQUEST['select']); $i++){
                                $select = $_REQUEST['select'][$i];
                                
                                
                                $query = mysql_query("SELECT * FROM product WHERE product_id = '$select'");
                                
                                if(mysql_num_rows($query)){
                                
                                    
                                while($rows = mysql_fetch_assoc($query)){
                                    $product_id = $rows['product_id'];
                                    $restaurant_id = $rows['restaurant_id'];
                                    $product_name = $rows['product_name'];
                                    $product_price = $rows['product_price'];
                                    
                                    $tot_p += $product_price;
                                    ?>
                                    
                                    
    		  <tr>
    		  	   <td>
                       <input type="hidden" name="product_id[]" value="<?php echo $product_id; ?>">
                       <input name="product_name[]" type="text" value="<?php echo $product_name; ?>" required readonly class="form-control product_name"></td>
    		  	   <td><input type="text" name="price[]" value="<?php echo $product_price; ?>" class="form-control price" required readonly style="text-align: right;"></td>
    		  	   <td><input type="text" name="quantity[]" value="1" class="form-control quantity" required style="text-align: center;"></td>
    		  	   <td><input type="text" name="amount[]" value="<?php echo $product_price; ?>" readonly class="form-control amount" required style="text-align: right;"></td>
    		  	   <td><input type="button"  class="btn btn-danger remove" value="Remove"></td>
    		  </tr>
                                    <?php
                                }
                                } else {
                                    echo mysql_error();
                                }
                            }
                            ?>
                            
    	</tbody>
    	<tfoot>
    		<tr>   
    		    <td></td>
    		    <td></td>
    		    <td></td> 
    			<td>
                    <?php
                    
                    ?>
    				<label>Total Amount</label>
    				<input type="text" name="subtotal" value="<?php echo $tot_p; ?>" readonly class="subtotal form-control" style="text-align: right;">
    			<!--
    				<label>Get Pay</label>
    				<input type="text" name="pay" class="pay form-control">
    			
    				<label>Return</label>
    				<input type="text" name="return" class="return form-control"> -->
                    <br/>
    				<input type="submit" class="btn btn-primary" name="order" value="Confirm & Order">
    			</td>
    		</tr>
    	</tfoot>
    </table>
  </form>
                            
                            <?php
                            
                        } else {
                                 
				if(isset($_GET['submit'])){
					$res_name = $_GET['res_name'];
					echo '<h2 align="center">Welcome to '.$res_name.'</h2>';
					$query = mysql_query("SELECT * FROM `product` WHERE `restaurant_name`= '$res_name'");
					if(mysql_num_rows($query)){
                        
                        
				?>
                <h5 align="center">Select your item to order</h5>
				<form method="get">
			  <table align="center" width="80%" border="1" cellpadding="5" cellspacing="0">
  
    <tr>
      <td width="10%" align="center" valign="middle">Item ID</td>
      <td width="55%" align="center" valign="middle">Food Name</td>
      <td width="20%" align="center" valign="middle">Price [Tk.]</td>
      <td width="10%" align="center" valign="middle">Select</td>
		
    </tr>
					<tbody>
				<?php
                        
						while($rows = mysql_fetch_array($query)){
							$product_id = $rows['product_id'];
							$product_name = $rows['product_name'];
							$product_discount = $rows['product_discount'];
							$product_price = $rows['product_price'];
							$product_image =  $rows['product_photo'];
							?>		
                        
                        
							<tr>
							  <td align="center"><?php echo $product_id; ?></td>
							  <td align="left"><?php echo $product_name; ?></td>
							  <td align="right"><?php echo $product_price; ?></td>
							  <td align="center">
                                  <input type="hidden" name="res_name" value="<?php echo $res_name; ?>">
                                  <input type="checkbox" name="select[]" value="<?php echo $product_id; ?>"></td>
							</tr>
                        
					
				
				<?php
						}
                        ?>
                        
				
						</tbody>
					</table>
				<br>
								
						<input type="submit" name="sel" value="Next" class="btn btn-dark">
					</form>
                        
                        <?php
					}
					
				}
                        }
                        
                   
				?>
					
				
						
			  <div style="height: 300px;"></div>
				<!-- Body End -->	
		  </div>
			
		</div>
	</div>
	<div style="height: 300px;"></div>
	<br>
    
    
<script type="text/javascript">
    

    function total()
    {
       var gg = 0;
       $('.amount').each(function(i,e){
       		var amt = $(this).val()-0;
       		gg += amt;
       	});
       $('.subtotal').val(gg);
    }



	$(function(){


		// add new row 
		$('.add').click(function(){
			var tr = '<tr>'+
		    		  	   '<td><input type="text" name="product_name[]" class="form-control product_name" required="required"></td>'+
						   '<td><textarea name="product_desc[]" class="form-control product_desc" required></textarea></td>'+
		    		  	   '<td><input type="text" name="price[]" class="form-control price" required="required"></td>'+
		    		  	   '<td><input type="text" name="quantity[]" class="form-control quantity" required="required"></td>'+
		    		  	   '<td><input type="text" name="amount[]" class="form-control amount" required="required"></td>'+
		    		  	   '<td><input type="button"  class="btn btn-danger remove" value="Remove"></td>'+
		    		  '</tr>';
		  $('.details').append(tr);
		});
		// end 

		// total amount 
		$('.details').delegate('.quantity,.price','keyup',function(){
			var tr = $(this).parent().parent();
			var price = tr.find('.price').val();
			var qty   = tr.find('.quantity').val();
			var amount = price * qty;
			tr.find('.amount').val(amount);
			total();
		});
		// end 


		// delete row 
		$('.details').delegate('.remove','click',function(){
				var con = confirm("Do you want to remove it ?");
				if(con)
				{
					$(this).parent().parent().remove();
					total();
				}

		});
		// end 


		//get pay
		$('.pay').change(function(){
			var subtotal = $('.subtotal').val()-0;
			var get      = $(this).val()-0;
			$('.return').val(get - subtotal);
		});
		// end 
	});
</script>
    
    
	<?php require_once('footer.php'); ?>
</body>
</html>