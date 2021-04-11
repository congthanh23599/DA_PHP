<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/brand.php';?>
<?php include_once '../classes/category.php';?>
<?php include_once '../classes/cart.php';?>
<?php include_once '../helper/format.php';?>
<?php 
	$fm = new Format();
	$ct = new  cart();
	if (isset($_GET['delid'])) 
		{
			$id = $_GET['delid'];
			$delcart = $ct->del_admin_cart($id) ;
		}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <?php 
			if (isset($delcart)) {
				echo $delcart;
			}
		?>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>ID sản phẩm</th>
					<th>Tên sản phẩm</th>
					<th>Giá sản phẩm</th>
					<th>Số lượng</th>
					<th>Hình ảnh sản phẩm</th>
					<th>ID user</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php  	
				 		
						$cartlist = $ct->show_product_cart();
						if ($cartlist) 
						{	$i=0;
							while ($result = $cartlist->fetch_assoc()) 
							{
								$i++
							
						
				 ?>
				<tr class="odd gradeX">
					<td><?php echo $i?></td>
					<td><?php echo $result['productID']?></td>
                    <td><?php echo $result['productName']?></td>
					<td><?php echo $result['price']?></td>
                    <td><?php echo $result['quantity']?></td>
					<td><img src="uploads/<?php echo $result['image']?>" alt="Image" width="80"></td>
					
					<td><?php echo $result['UserID']?></td>
					<!-- giới hạn ký tự product_desc 50kys tự -->
					<!-- <td><?php echo $fm->textShorten($result['product_desc'], 20) ;?></td> -->
					
					
					<td><a href="productedit.php?productID=<?php echo $result['productID']?>">Sửa</a> ||<a onclick="return confirm('Bạn có muốn xóa không?')" href="?delid=<?php echo $result['cartID']?>">Xóa</a> </td>
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
