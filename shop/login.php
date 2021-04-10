<?php 
include'./inc/header.php';
// include'./inc/slider.php';
?>
<?php 
	$login_check = Session::get('user_login');
	if ($login_check) {
		header('Location:order.php');
	} 
				
?>
<?php
       
	   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
		   
		   $loginCustomer = $cs->login_Customer($_POST) ;
		   
	   }
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


<div class="container">
<!-- <br>  <p class="text-center">More bootstrap 4 components on <a href="http://bootstrap-ecommerce.com/"> Bootstrap-ecommerce.com</a></p> -->
<br>


<div class="row justify-content-center">
<div class="col-md-6">
<div class="card">
<header class="card-header">
	<a href="Register.php" class="float-right btn btn-outline-primary mt-1">Đăng ký</a>
	<h4 class="card-title mt-2">Đăng nhập</h4>
	<?php 
        if (isset($loginCustomer)) 
        {
			echo $loginCustomer;
		}
    ?>
</header>
<article class="card-body">
<form action="" method="POST">
	<div class="form-row">
		<div class="col form-group">
			<label>Tài khoản </label>   
		  	<input type="text"placeholder="Nhập Email" name="email" class="form-control" placeholder="">
		</div> 
		
	</div>
	
	<div class="form-group">
		<label>Mật khẩu</label>
	    <input class="form-control" placeholder="Nhập password" name="password" type="password">
	</div> 
 
    <div class="form-group">
		<input type="submit" name="submit" value="Đăng Nhập" class="btn btn-primary btn-block"> 
    </div> <!-- form-group// -->      
</form>
</article> <!-- card-body end .// -->
<div class="border-top card-body text-center">Chưa có tài khoản? <a href="Register.php">Đăng ký</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div> 
<!--container end.//-->

<br><br>
