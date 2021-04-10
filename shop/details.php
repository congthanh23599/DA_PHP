<?php 
	include'./inc/header.php';
	//include'./inc/slider.php';
?>
<?php
	if (!isset($_GET['proID']) || $_GET['proID']== null) 
	{
		echo "<script>window.location='404.php'</script>";
	}else 
	{
		$id = $_GET['proID'];
	}
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
		$quantity = $_POST['quantity'];
		$addToCart = $ct->Add_To_Cart($quantity, $id) ;
		
	}
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
		<?php 
			$getpro_details = $product->get_details($id);
			if ($getpro_details) 
			{
				while ($result_details = $getpro_details->fetch_assoc()) 
				{
				   
		?>
		<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result_details['image'] ;?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result_details['productName'] ?> </h2>
					<br>
					<!-- <p><?php echo $fm->textShorten($result_details['product_desc'], 50)  ?></p>					 -->
					<div class="price">
						<p>Gía: <span><?php echo $result_details['price']." "."VND" ;?></span></p>
						<p>Loại sản phẩm: <span><?php echo $result_details['catName'] ?></span></p>
						<p>Thương hiệu:<span><?php echo $result_details['brandName'] ?></span></p>
						<br>
					</div>
					<div class="add-cart">
						<form action="" method="post">
							<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
							<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
						</form>	
						<?php 
								if (isset($addToCart)) {
									echo $addToCart;
								
							}?>			
					</div>
				</div>
				<div class="product-desc">
				<h2>Mô tả sản phẩm</h2>
				<p><?php echo $result_details['product_desc'] ?></p>		
				</div>
		
			</div>
		<?php 
             }
                    
            }
        ?>	
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
						<?php 
							$getall_category =$cat->show_category_front_end();
							if ($getall_category) 
								{	
									while ($result = $getall_category->fetch_assoc()) 
									{	
						?>
				      <li><a href="productbycat.php?catID=<?php echo $result['catID'] ?>"><?php echo $result['catName'] ?></a></li>
				     <?php }}?>
    				</ul>
    	
 				</div>
			
 		</div>
 	</div>
<?php 
include'./inc/footer.php';

?>
