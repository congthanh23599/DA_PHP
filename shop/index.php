<?php 
include'./inc/header.php';
include'./inc/slider.php';
?>
<!-- <?php 
	$login_check = Session::get('user_login');
	if ($login_check == false) {
		header('Location:login.php');
	} 
				
?> -->

<div class="main">

    <div class="content">
        <div class="content_top">
            <div class="heading">
                <h3>Sản phẩm nổi bật</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php 
                $getproduct_noibat = $product->getprodut_NoiBat();
                if ($getproduct_noibat) {
                    while ($result = $getproduct_noibat->fetch_assoc()) 
                    {
                       
                   
            ?>
            <div class="grid_1_of_4 images_1_of_4 "style="height: 500px;">
                <a href="details.php"><img src="admin/uploads/<?php echo $result['image'] ;?>" alt="" /></a>
                <h2><?php echo $result['productName'] ;?> </h2>
                <p><?php echo $fm->textShorten($result['product_desc'],50)  ;?></p>
                <p><span class="price"><?php echo $result['price']." "."VND" ;?></span></p>
                <div class="button"  ><span><a href="details.php?proID=<?php echo $result['productID']; ?>" class="details"  >Details</a></span></div>
            </div>
            <?php 
             }
                    
            }
            ?>
        </div>
        <div class="content_bottom">
            <div class="heading">
                <h3>Sản phẩm mới</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
        <?php 
                $getproduct_moi = $product->getprodut_Moi();
                if ($getproduct_moi) {
                    while ($result_moi = $getproduct_moi->fetch_assoc()) 
                    {
                       
                   
            ?>
            <div class="grid_1_of_4 images_1_of_4" style="height: 500px;">
                <a href="details.php"><img src="admin/uploads/<?php echo $result_moi['image'] ;?>" alt="" /></a>
                <h2><?php echo $result_moi['productName'] ;?> </h2>
                <p><?php echo $fm->textShorten($result_moi['product_desc'],50)  ;?></p>
                <p><span class="price"><?php echo $result_moi['price']." "."VND" ;?></span></p>
                <div class="button"><span><a href="details.php?proID=<?php echo $result_moi['productID']; ?>" class="details">Details</a></span></div>
            </div>
            <?php 
             }
                    
            }
            ?>
        </div>
        </div>
    </div>
</div>
<?php 
include'./inc/footer.php';

?>