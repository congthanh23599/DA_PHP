<?php 
	include'./inc/header.php';
	//include'./inc/slider.php';
?>
<?php 
	if (isset($_GET['delid'])) 
	{
		$delid = $_GET['delid'];
		$delcart = $ct->del_cart($delid) ;
	}
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
		$quantity = $_POST['quantity'];
		$cartID = $_POST['cartID'];
		$UserID =  $_POST['UserID'];
		$update_SL_Cart = $ct->update_SL_Cart($quantity, $cartID, $UserID) ;
		if($quantity <=0)
		{
			$delcart = $ct->del_cart($cartID) ;
		}
	}
?>
<?php 
	// tự động refresh về id=live chứ ko thì khi bấm update or delete sẽ không cập nhập liền đc
	if (!isset($_GET['id'])) {
		echo " <meta http-equiv='refresh' content='0; URL=?id=live'>";
	}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2 style="color: #028EE6;">Giỏ hàng</h2>
					<?php 
						if (isset($update_SL_Cart)) {
							echo $update_SL_Cart;
						}
					?>
					<?php 
						if (isset($delcart)) {
							echo $delcart;
						}
					?>
						<table class="table table-hover table-bordered border-primary">
							<tr>
								<th width="20%">Sản phẩm</th>
								<th width="10%">Image</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng giá</th>
								<th width="10%">Action</th>
							</tr>
							<?php 
								$get_product_cart = $ct->get_product_cart();
								if ($get_product_cart) 
								{	$tonggia = 0;
									$SL = 0;
									while ($result = $get_product_cart->fetch_assoc()) 
									{	
							?>
							<tr>
								<td><?php echo $result['productName'];?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ;?>" alt="" /></td>
								<td> <?php echo $result['price']." "."VND";?></td>
								<td>
									<form action="" method="post">
										<input type="number" min="0" name="quantity" value="<?php echo $result['quantity']; ?>"/>
										<input type="hidden" name="cartID" value="<?php echo $result['cartID']; ?>"/>
										<input type="hidden" name="UserID" value="<?php $id = Session::get('user_ID');echo $id; ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td> <?php
								$tong =$result['price'] *$result['quantity'];
								echo $tong;?></td>
								<td><a onclick="return confirm('Bạn có muốn xóa không?')"  href="?delid=<?php echo $result['cartID']?>">Xóa</a></td>
							</tr>
							<?php 
								$tonggia += $tong;
								$SL = $SL + $result['quantity'];
								}
							}
							?>
							
							
						</table>
					
						<table class=" table-bordered border-primary" style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Tổng giá : </th>
								<td><?php 
									
									echo $tonggia." "."VND";
									// Session::set('sum', $tonggia);
									Session::set('SL', $SL);
								 ?>
								 </td>
							</tr>
							<!-- <tr>
								<th>VAT : </th>
								<td>TK. 31500</td>
							</tr>
							<tr>
								<th>Giá tổng:</th>
								<td>TK. 241500 </td>
							</tr> -->
							<tr>
							<td></td>
							<th></th>
							<td><a class="btn btn-outline-danger" href="offlinepay.php" role="button">Mua hàng</a></td>	
							</tr>
					   </table>
				
						<br><br><br>
					
					</div>
					<!-- <div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="login.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div> -->
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
 <?php 
include'./inc/footer.php';

?>