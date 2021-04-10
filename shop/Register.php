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
    $cs = new customer();
	$product = new product();
?>


<?php
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            
            $insertCustomer = $cs->insert_Customer($_POST) ;
            
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
	<a href="login.php" class="float-right btn btn-outline-primary mt-1">Đăng nhập</a>
	<h4 class="card-title mt-2">Đăng ký</h4>
    <?php 
        if (isset($insertCustomer)) 
        {
			echo $insertCustomer;
		}
    ?>
</header>
<article class="card-body">
<form action="" method="POST">
	<div class="form-row">
		<div class="col form-group">
			<label>Name </label>   
		  	<input type="text" name="name" class="form-control" placeholder="">
		</div> <!-- form-group end.// -->
		<!-- <div class="col form-group">
			<label>Last name</label>
		  	<input type="text" class="form-control" placeholder=" ">
		</div>  -->
        <!-- form-group end.// -->
	</div> <!-- form-row end.// -->
	<div class="form-group">
		<label>Email address</label>
		<input type="email" name="email" class="form-control" placeholder="">
		<small class="form-text text-muted">We'll never share your email with anyone else.</small>
	</div>
    <div class="form-group">
		<label>Phone</label>
		<input type="text" name="phone" class="form-control" placeholder="">
	
	</div>
     <!-- form-group end.// -->
	<div class="form-group">
		<label class="form-check form-check-inline">
		  <!-- <input class="form-check-input" type="radio" name="gender" value="1">
		  <span class="form-check-label"> Male </span> -->
          <select class="form-control" id="select" name="gender">
                <option>Giới tính</option>
                <option value="1">Nam</option>
                <option value="0">Nữ</option>
            </select>
		</label>
        
		<!-- <label class="form-check form-check-inline">
		  <input class="form-check-input" type="radio" name="gender" value="0">
		  <span class="form-check-label"> Female</span>
		</label> -->
	</div> 
    <!-- form-group end.// -->
	
    <div class="form-group">
    <label>Address</label>
		  <input type="text" name="address" class="form-control">
	</div>
	<div class="form-group">
		<label>Nhập password</label>
	    <input class="form-control" name="password" type="password">
	</div>
     <!-- form-group end.// -->  
    <div class="form-group">
        <input type="submit" name="submit" value="Đăng ký" class="btn btn-primary btn-block">  
    </div> <!-- form-group// -->      
</form>
</article> <!-- card-body end .// -->
<div class="border-top card-body text-center">Có tài khoản ? <a href="login.php">Đăng nhập</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div> 
<!--container end.//-->

<br><br>
<!-- <article class="bg-secondary mb-3">  
<div class="card-body text-center">
    <h3 class="text-white mt-3">Bootstrap 4 UI KIT</h3>
<p class="h5 text-white">Components and templates  <br> for Ecommerce, marketplace, booking websites 
and product landing pages</p>   <br>
<p><a class="btn btn-warning" target="_blank" href="http://bootstrap-ecommerce.com/"> Bootstrap-ecommerce.com  
 <i class="fa fa-window-restore "></i></a></p>
</div>
<br><br>
</article> -->