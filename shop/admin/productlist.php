<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/brand.php';?>
<?php include_once '../classes/category.php';?>
<?php include_once '../classes/product.php';?>
<?php include_once '../helper/format.php';?>
<?php 
	$fm = new Format();
	$pd = new product();
	if (isset($_GET['delid'])) 
		{
			$id = $_GET['delid'];
			$delproduct = $pd->del_product($id) ;
		}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tên sản phẩm</th>
					<th>Giá sản phẩm</th>
					<th>Hình ảnh sản phẩm</th>
					<th>Thương hiệu</th>
					<th>Loại sản phẩm</th>
					<th>Mô tả sản phẩm</th>
					<th>Loại</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php  	
				 		
						$pdlist = $pd->show_product();
						if ($pdlist) 
						{	$i=0;
							while ($result = $pdlist->fetch_assoc()) 
							{
								$i++
							
						
				 ?>
				<tr class="odd gradeX">
					<td><?php echo $i?></td>
					<td><?php echo $result['productName']?></td>
					<td><?php echo $result['price']?></td>
					<td><img src="uploads/<?php echo $result['image']?>" alt="Image" width="80">
					</td>
					<td><?php echo $result['brandName']?></td>
					<td><?php echo $result['catName']?></td>
					<!-- giới hạn ký tự product_desc 50kys tự -->
					<td><?php echo $fm->textShorten($result['product_desc'], 20) ;?></td>
					<td><?php 
						if ($result['type'] ==1)
						{
							echo "Nổi bật";
						}
						else 
						{
							echo "Không nổi bật";
						}
					?></td>
					
					<td><a href="productedit.php?productID=<?php echo $result['productID']?>">Edit</a> ||<a onclick="return confirm('Bạn có muốn xóa không?')" href="?delid=<?php echo $result['productID']?>">Delete</a> </td>
				</tr>
				<?php 
					}
				}
				?>
				
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
