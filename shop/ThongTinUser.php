<?php 
include'./inc/header.php';
//include'./inc/slider.php';
?>
<?php 
	if (!isset($_GET['IDuser']) || $_GET['IDuser']== null) 
	{
		echo "<script>window.location='login.php'</script>";
	}else 
	{
		$id = $_GET['IDuser'];
	}
?>
 <div class="main">
    <div class="content">
    	<!-- <div class="support">
  			<div class="support_desc">
  				<p>Live Support<p>
  				</h3><span>24 hours | 7 days a week | 365 days a year &nbsp;&nbsp; Live Technical Support</span></h3>
  				</h3> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</h3>
  			</div>
  				<img src="web/images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>	 -->
    	<div class="section group">
				<div class="col span_2_of_3">
				<div class="contact-form">
				  	<h2>Thông tin người dùng </h2>
					   
						<div class="col span_1_of_3">
						<?php 
							$get_user_by_id = $cs->getThongTinUsser($id);
								if($get_user_by_id)
								{
									while ($resultUserID = $get_user_by_id->fetch_assoc()) 
									{
						?>        
						 <!-- <form>
					    	
							<div>
									<span><input type="submit" value="SUBMIT"></span>
								 <td><a href="useredit.php?IDuser=<?php echo $result['productID']?>">Edit</a> 
						   </div>
						 </form> -->
							<div class="company_address">
									<h2>Họ tên:</h2>
											<h3><?php echo $resultUserID['Name'] ?></h3>
									<h2>Địa Chỉ:</h2>
											<h3><?php echo $resultUserID['Address'] ?></h3>
									<h2>Số điện thoại:</h2>
											<h3><?php echo $resultUserID['Phone'] ?></h3>
									<h2>Giới tính:</h2>
											<h3>
											<?php 
											if (isset($resultUserID['Gender'])) {
												echo "Nam";
											} 
											else 
											{
												echo "Nữ";
											}
											  ?>
											<h3>
									<h2>Email:</h2>
											<h3><?php echo $resultUserID['Email'] ?></h3>
											
									
									<!-- Password field -->
									<h2>Password:</h2> <input type="password" value="<?php echo $resultUserID['Password'] ?>" id="myInput">

									<!-- An element to toggle between password visibility -->
									<input type="checkbox" onclick="myFunction()">Show Password
										
											
							</div>
						<?php 
                           }
                        } 
                        ?>
				 		</div>
				  </div>
  				</div>
				
			  </div>    	
    </div>
 </div>
 <script>
 function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
 <?php 
include'./inc/footer.php';

?>