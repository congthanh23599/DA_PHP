<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
	
?>
<?php

	if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
       //$customer_id = Session::get('customer_id');
	   $userID = Session::get('user_ID');
       $insertOrder = $ct->insertOrder($userID);
       $delcart = $ct->del_all_cart();
    }
?>
<style type="text/css">
	.box_left {
    width: 47%;
    border: 1px solid #666;
    float: left;
    padding: 4px;	
	height: auto;

	}
 	.box_right {
    width: 47%;
    border: 1px solid #666;
    float: right;
    padding: 4px;
	height: auto;
	}
</style>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
			<div class="heading">
	    		<h3>Thanh toán trực tiếp</h3>
	    	</div>
	    		
	    	<div class="clear"></div>
    		<div class="box_left">
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
    		<div class="box_right">
    			<table class="table">
				<?php
				$id = Session::get('user_ID');
				$get_customers = $cs->show_customers($id);
				if($get_customers){
					while($result = $get_customers->fetch_assoc()){

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
					<td colspan="3"><a class="mx-auto" href="editprofile.php">Sửa thông tin</a></td>
					
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
