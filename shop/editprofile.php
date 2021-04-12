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
 	$id = Session::get('user_ID');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
       
        $Updateusers = $cs->update_users($_POST, $id);
        
    }
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
	    		<div class="heading">
	    		<h3>Sửa thông tin cá nhân</h3>
	    		</div>
	    		<div class="clear"></div>
    		</div>
			<form action="" method="post">
			<table class="table">
				<tr>
					
						<?php
						if(isset($Updateusers)){
							echo '<td colspan="3">'.$Updateusers.'</td>';
						}
						?>
					
				</tr>
				<?php
				$id = Session::get('user_ID');
				$get_users = $cs->show_users($id);
				if($get_users){
					while($result = $get_users->fetch_assoc()){

				?>
				<tr>
					<td>Họ và tên</td>
					<td>:</td>
					<td><input type="text" name="Name" value="<?php echo $result['Name'] ?>"></td>
				</tr>
				<tr>
					<td>Địa chỉ</td>
					<td>:</td>
					<td><input type="text" name="Address" value="<?php echo $result['Address'] ?>"></td>
					
				</tr>
				<tr>
					<td>Số điện thoại</td>
					<td>:</td>
					<td><input type="text" name="Phone" value="<?php echo $result['Phone'] ?>"></td>
				
				</tr>
				
				<tr>
					<td>Giới tính</td>
                    <td>:</td>
                    <td>
                    <select id="select" name="Gender">
                            <option>Chọn loại</option>
                            <?php 
                                if ($result['Gender'] == 1)
                                {
                            ?>
                            <option selected value="1">Nam</option>
                            <option  value="0">Nữ</option>
                            <?php  
                                }
                                else 
                                {
                            ?>
                            <option  value="1">Nam</option>
                            <option selected  value="0">Nữ</option>
                                <?php
                                }   
                                ?>
                        </select>
                    </td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><input type="text" name="Email" value="<?php echo $result['Email'] ?>"></td>
					
				</tr>
				<tr>
					<td><a class="btn btn-outline-primary" href="ThongTinUser.php" role="button">trở về trang thông tin</a></td>
					<td ><input class="btn btn-outline-primary" type="submit" name="save" value="Lưu"></td>
				</tr>
				<?php
					}
				}
				?>
			</table>
			</form>
 		</div>
 	</div>
 </div>
<?php 
	include 'inc/footer.php';
	
 ?>
