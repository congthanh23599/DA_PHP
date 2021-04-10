<?php 
include'./inc/header.php';
// include'./inc/slider.php';
?>
<?php 
	
	if (!isset($_GET['catID']) || $_GET['catID']== null) {
	echo "<script>window.location='404.php'</script>";
	}else {
		$id = $_GET['catID'];
	}
	// if ($_SERVER['REQUEST_METHOD'] === "POST") {
	// 	// the request using post method
	// 	$catName = $_POST['catName'];
		
	// 	$updateCat = $cat->update_category($catName, $id) ;
	// }
?>
 <div class="main">
    <div class="content">
		<?php 
				$name_cat = $cat->get_name_cat($id);
				if ($name_cat) 
				{	
					while ($result_name = $name_cat->fetch_assoc()) 
					{
		?>
			<div class="content_top">
				
				<div class="heading">
				<h3><?php echo $result_name['catName'] ;?></h3>
				</div>
			
				<div class="clear"></div>
			</div>
		<?php }}?>
			
	    <div class="section group">
		  	<?php 
				$productbycat = $cat->productbycat($id);
				if ($productbycat) 
				{	
					while ($result = $productbycat->fetch_assoc()) 
					{
			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details-3.php"><img src="admin/uploads/<?php echo $result['image'] ;?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ;?> </h2>
					 <p><?php echo $fm->textShorten( $result['product_desc'], 50) ;?></p>
					 <p><span class="price"><?php echo $result['price'] ;?></span></p>
				     <div class="button"><span><a href="details.php?proID=<?php echo $result['productID']; ?>" class="details">Details</a></span></div>
				</div>
			<?php }} 
				else
				{
					echo 'Danh mục chưa có sản phẩm nào!!!';
				}
			?>
		</div>
			

	
	
    </div>
 </div>
 <?php 
include'./inc/footer.php';

?>