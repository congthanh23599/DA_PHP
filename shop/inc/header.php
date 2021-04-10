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
	$cs = new customer();

?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Store Website</title>
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
						<!-- icons cửa hàng-->
				<!-- <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
  					<path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/>
				</svg> -->
						<a href="#" style="width: 1px;" title="View my shopping cart" rel="nofollow">
								<span class="cart_title"></span>
								<span class="no_product">
									<?php 
									$check_cart = $ct->check_cart();
										if ($check_cart) {
											//$sum = Session::get("sum");// dáu "" dùng để lấy giá trị của biến đó
											$SL = Session::get("SL");// dáu "" dùng để lấy giá trị của biến đó
											echo $SL;//$sum.' '.'d'.'-'.'SL:'.
										}
										else
										{
											echo "Rỗng";
										}
										
									?>
								</span>
							</a>
						</div>
			      </div>

			<?php 
			
				if (isset($_GET['user_login'])) 
				{	
					//$delcart = $ct->del_all_cart();
					// unset($_SESSION['user_ID']);
					// header("Location:login.php");
					//Session::destroy();
					session_destroy();
				}
				
			?>
			<?php 
				$login_check = Session::get('user_login');
				if ($login_check == false) 
				{
					echo" <div style='margin-left: 5px;' class='btn btn-outline-secondary'><a href='login.php'>Đăng nhập</a></div>";
					echo"<div class='btn btn-outline-primary'><a href='Register.php'>Đăng ký</a></div>";
				} 
				else 
				{
					echo '<a  class="btn btn-outline-secondary" style="margin-left: 5px;" href="?userID='.Session::get("user_ID").'" >Đăng Xuất</a>';
				}
				
			?>
		  
		   
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="products.php">Products</a> </li>
	  <li><a href="topbrands.php">Top Brands</a></li>
	  <li><a href="carts.php">Cart</a></li>
	  <li><a href="contact.php">Contact</a> </li>

	  <div class="clear"></div>
	</ul>
</div>