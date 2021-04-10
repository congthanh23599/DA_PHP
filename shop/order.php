<?php 
	include'./inc/header.php';
	//include'./inc/slider.php';
?>
<?php 
	$login_check = Session::get('user_login');
	if ($login_check == false) {
		header('Location:login.php');
	} 
				
?>
<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    <div class="not_found">
                    <h3>Order page</h3>
                </div>	
			</div>
					
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php 
include'./inc/footer.php';

?>