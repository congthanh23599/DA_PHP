<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/brand.php';?>
<?php include_once '../classes/category.php';?>
<?php include_once '../classes/customer.php';?>
<?php include_once '../helper/format.php';?>
<?php 
	$fm = new Format();
	$cus = new  customer();
	if (isset($_GET['delid'])) 
		{
			$id = $_GET['delid'];
			$deluser = $cus->del_user($id) ;
		}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <?php 
			if (isset($deluser)) {
				echo $deluser;
			}
		?>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tên user</th>
					<th>Địa chỉ</th>
					<th>Số điện thoại</th>
					<th>giới tính</th>
					<th>Email</th>
					<th>Password </th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php  	
				 		
						$cuslist = $cus->show_ALL_customer();
						if ($cuslist) 
						{	
							while ($result = $cuslist->fetch_assoc()) 
							{
								
							
						
				 ?>
				<tr class="odd gradeX">
					
					<td><?php echo $result['ID']?></td>
                    <td><?php echo $result['Name']?></td>
					<td><?php echo $result['Address']?></td>
                    <td><?php echo $result['Phone']?></td>
					<td><?php 
						if ($result['Gender'] ==1)
						{
							echo "Name";
						}
						else 
						{
							echo "Nữ";
						}
					?></td>
					
					<td><?php echo $result['Email']?></td>
					
					<td><?php echo $result['Password'] ;?></td> 
					
					
					<td><a href="useredit.php?UserID=<?php echo $result['ID']?>">Sửa</a> ||<a onclick="return confirm('Bạn có muốn xóa không?')" href="?delid=<?php echo $result['ID']?>">Xóa</a> </td>
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
