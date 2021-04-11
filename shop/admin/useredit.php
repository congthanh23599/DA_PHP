<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../classes/customer.php';?>

<?php
        if (!isset($_GET['UserID']) || $_GET['UserID']== null) 
        {
            echo "<script>window.location='userlist.php'</script>";
        }else 
        {
              $id = $_GET['UserID'];
        }
        $cus = new customer();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            
            $updateUser = $cus->update_user($_POST, $id) ;
        }
       
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa thông tin người dùng</h2>
        <div class="block">   
        <?php 
            if (isset($updateUser)) {
                echo $updateUser;
            }       
        ?>     
        <?php 
            $get_user_by_id = $cus->getUserID($id);
                if($get_user_by_id)
                {
                    while ($resultUserID = $get_user_by_id->fetch_assoc()) 
                    {
         ?>          
    
          <form action=""  method="post" >
            <table class="form">
                <tr>
                    <td>
                        <label>Tên người dùng</label>
                    </td>
                    <td>
                        <input type="text" name="Name" value="<?php echo $resultUserID['Name'] ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Địa chỉ</label>
                    </td>
                    <td>
                        <input type="text" name="Address" value="<?php echo $resultUserID['Address'] ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Số điện thoại</label>
                    </td>
                    <td>
                        <input type="text" name="Phone" value="<?php echo $resultUserID['Phone'] ?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Giới tính</label>
                    </td>
                    
                    <td>
                        <select id="select" name="Gender">
                            <option>--Chọn--</option>
                            <?php 
                                if ($resultUserID['Gender'] ==1)
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
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text" name="Email" value="<?php echo $resultUserID['Email'] ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Password</label>
                    </td>
                    <td>
                        <input type="text" name="Password" value="<?php echo $resultUserID['Password'] ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        <?php
         } 
        }
        ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


