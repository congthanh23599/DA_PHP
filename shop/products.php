<?php 
include_once'./inc/header.php';
//include'./inc/slider.php';
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Sản phẩm</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		
	      <div class="section group">
		  <?php 
				$show_product = $product->show_ALL_product();
				if ($show_product) 
				{	
					while ($result = $show_product->fetch_assoc()) 
					{
			?>
				<div class="grid_1_of_4 images_1_of_4" style="height: 500px;">
					 <a href="details-3.php"><img src="admin/uploads/<?php echo $result['image'] ;?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ;?> </h2>
					 <p><?php echo $fm->textShorten( $result['product_desc'],50) ;?> </p>
					 <p><span class="price"><?php echo $result['price'] ;?></span></p>
				     <div class="button"><span><a href="details.php?proID=<?php echo $result['productID']; ?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php }}?>
			</div>
			
		
    </div>
 </div>
 <?php 
include'./inc/footer.php';

?>