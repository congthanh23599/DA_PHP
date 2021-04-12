<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php
	
	$login_check = Session::get('user_login'); 
	if($login_check==false){
		header('Location:login.php');
	}
		
?>
<?php

	// if(!isset($_GET['proid']) || $_GET['proid']==NULL){
 //       echo "<script>window.location ='404.php'</script>";
 //    }else{
 //        $id = $_GET['proid']; 
 //    }
 //    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
 //        $quantity = $_POST['quantity'];
 //        $AddtoCart = $ct->add_to_cart($quantity, $id);
        
 //    }
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
	    		<div class="heading">
	    		<h3>Thông tin cá nhân</h3>
	    		</div>
	    		<div class="clear"></div>
    		</div>
			
			<table class="table">
				<?php
				$id = Session::get('user_ID');
				$get_user = $cs->show_users($id);
				if($get_user){
					while($result = $get_user->fetch_assoc()){

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
					<td>Số diện thoại</td>
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
<?php 
	include 'inc/footer.php';
	
 ?>
