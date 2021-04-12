<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
	
?>
<?php
	if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
       //$user_id = Session::get('user_id');
	   $userID = Session::get('user_ID');
       $insertOrder = $ct->insertOrder($userID);
       $delcart = $ct->del_all_cart();
    }
?>

</style>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
			<div class="heading">
	    		<h3>Thanh toán trực tiếp</h3>
	    	</div>
	    		
	    	<div class="clear"></div>
    		<div>
    			<div class="cartpage">
			    	
			    	<?php
			    	 if(isset($delcart)){
			    	 	echo $delcart;
			    	 }
			    	?>
						<table class="table">
							<tr>
								<th width="5%">STT</th>
								<th width="15%">Tên sản phẩm</th>
								
								<th width="15%">Giá</th>
								<th width="25%">SL</th>
								<th width="20%">Tổng tiền</th>
								
							</tr>
							<?php
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$subtotal = 0;
								$qty = 0;
								$i = 0;
								while($result = $get_product_cart->fetch_assoc()){
									$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName'] ?></td>
								
								<td><?php echo $result['price']." "."VNĐ" ?></td>
								<td>

									<?php echo $result['quantity'] ?>

								</td>
								<td><?php
								$tonggia = $result['price'] * $result['quantity'];
								echo $tonggia;
								 ?></td>
								
							</tr>
						<?php
							}
						}
						?>
							
						</table>
						
						<table style="float:right;text-align:left;margin:5px" width="50%">
							<tr>
								<th>Tổng tiền : </th>
								<td><?php 
								
										echo $tonggia." "."VND";
										// Session::set('sum', $tonggia);
										Session::set('SL', $SL);
									
								 ?>
								 </td>
							</tr>
							
					   </table>
					</div>
    		</div>
    		<div>
    			<table class="table">
				<?php
				$id = Session::get('user_ID');
				$get_users = $cs->show_users($id);
				if($get_users){
					while($result = $get_users->fetch_assoc()){

				?>
				<tr>
					<td>Họ và tên </td>
					<td>:</td>
					<td><?php echo $result['Name'] ?></td>
				</tr>
				<tr>
					<td>Địa chỉ</td>
					<td>:</td>
					<td><?php echo $result['Address'] ?></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td>:</td>
					<td><?php echo $result['Phone'] ?></td>
				</tr>
				<!-- <tr>
					<td>Country</td>
					<td>:</td>
					<td><?php echo $result['country'] ?></td>
				</tr> -->
				<tr>
					<td>Giới tính</td>
					<td>:</td>
					<td><?php if ($result['Gender'] == 1) {
						echo "Nam";
					} else {
						echo "Nữ";
					}
					 ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?php echo $result['Email'] ?></td>
				</tr>
				
				<tr>
					
					<td><a class="btn btn-outline-primary" href="editprofile.php" role="button">Sửa thông tin</a></td>
				</tr>
				
				<?php
					}
				}
				?>
			</table>
    		</div>

 		</div>

 	</div>
	<center><a href="?orderid=order" class=" btn btn-outline-danger" >Đặt hàng</a></center><br>
 </div>
</form>
<?php 
	include 'inc/footer.php';
	
 ?>
