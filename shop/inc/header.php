<?php 
    require_once './lb/session.php';
	require_once('C:/xampp/htdocs/DA_PHP/shop/lb/database.php');
	// './lb/database.php';
    require_once './helper/format.php';
    Session::init();
?>
<?php
    // lấy tất cả file trong folder classes
	spl_autoload_register(function($className) {
		require_once  "classes/" .$className . '.php';
	});
	
	
	$Db = new Database();
	$fm = new Format();
	$ct = new cart();
	$us = new user();
	$cat = new category();
	$product = new product();
	$cs = new user();

?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Shop Xinh</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" width="150px" height="100px" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form>
				    	<input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" style="width: 1px;" title="View my shopping cart" rel="nofollow">
								<span class="cart_title"></span>
								<span class="no_product">
									<?php 
									$check_cart = $ct->check_cart();
										if ($check_cart) 
										{
											
											$SL = Session::get("SL");// dáu "" dùng để lấy giá trị của biến đó
											echo $SL;
										}
										else
										{
											echo " ";
										}
									?>
								</span>
							</a>
						</div>
			      </div>

			<?php 
			
					if (isset($_GET['userID'])) 
					{	
						//$delcart = $ct->del_cart($cartID) ;
						Session::destroy();
					}
			?>
			<?php 
				$login_check = Session::get('user_login');
				if ($login_check == false) 
				{ 	
					echo" <div style='margin-left: 10px;' class='btn btn-outline-primary'><a href='login.php'>Đăng nhập</a></div>";
					echo"<div style='margin-left: 10px;' class='btn btn-outline-primary'><a href='Register.php'>Đăng ký</a></div>";
				} 
				else 
				{
					echo '<a  class="btn btn-outline-primary" style="margin-left: 5px;" href="?userID='.Session::get("user_ID").'" >Đăng Xuất</a>';
				}
				
			?>		   
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Trang Chủ</a></li>
	  <li><a href="products.php">Sản Phẩm</a> </li>
	  <li><a href="carts.php">Giỏ Hàng</a></li>
	  <?php 
			
			$login_check = Session::get('user_login');
			if ($login_check == false) 
			{ 	echo "";
				
			
			} 
			else 
			{
				echo '<li><a href="ThongTinUser.php?IDuser='.Session::get("user_ID").'">Tài khoản</a> </li>';
			}
				
		?>
	  <div class="clear"></div>
	</ul>
</div>