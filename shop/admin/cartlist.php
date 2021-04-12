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
			$delorder = $ct->del_admin_order($id) ;
		}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <?php 
			if (isset($delorder)) {
				echo $delorder;
			}
		?>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>ID sản phẩm</th>
					<th>ID user</th>
					<th>tên User</th>
					<th>Số lượng</th>
					<th>Giá sản phẩm</th>
					<th>Hình ảnh sản phẩm</th>
					<th>Địa chỉ </th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php  	
				 		
						$cartlist = $ct->show_order();
						if ($cartlist) 
						{	$i=0;
							while ($result = $cartlist->fetch_assoc()) 
							{
								$i++
							
						
				 ?>
				<tr class="odd gradeX">
					<td><?php echo $i?></td>
					<td><?php echo $result['productID']?></td>
                    <td><?php echo $result['userName']?></td>
					<td><?php echo $result['UserID']?></td>
                    <td><?php echo $result['quantity']?></td>
					<td><?php echo $result['price']?></td>
					<td><img src="uploads/<?php echo $result['image']?>" alt="Image" width="80"></td>
					
					<td><?php echo $result['address']?></td>
					<td><a onclick="return confirm('Bạn có muốn xóa không?')" href="?delid=<?php echo $result['ID']?>">Xóa</a> </td>
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
