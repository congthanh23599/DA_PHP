<?php 
include'./inc/header.php';
//include'./inc/slider.php';
?>
<!-- <?php 
	if (!isset($_GET['IDuser']) || $_GET['IDuser']== null) 
	{
		echo "<script>window.location='login.php'</script>";
	}else 
	{
		$id = $_GET['IDuser'];
	}
?> -->
 <div class="main">
    <div class="content">
    	
    	<div class="section group">
				<div class="col span_2_of_3">
				<div class="contact-form">
				  	<h2>Chọn thanh toán:  </h2>
                      <span class="border border-primary"></span>
						<div class="col span_1_of_3">
                            <a href="onlinenepay.php"> Thanh toán trực tuyến</a> <br>
                            <a href="offlinepay.php"> Thanh toán trực tiếp</a>
				 		</div>
				  </div>
  				</div>
				
			  </div>    	
    </div>
 </div>

 <?php 
include'./inc/footer.php';

?>