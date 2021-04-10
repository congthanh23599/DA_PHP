<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../classes/brand.php';?>
<?php require_once '../classes/category.php';?>
<?php require_once '../classes/product.php';?>
<?php
        if (!isset($_GET['productID']) || $_GET['productID']== null) 
        {
            echo "<script>window.location='productlist.php'</script>";
        }else 
        {
              $id = $_GET['productID'];
        }
        $pd = new product();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            
            $updateProduct = $pd->update_product($_POST, $_FILES, $id) ;
        }
       
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa sản phẩm</h2>
        <div class="block">   
        <?php 
            if (isset($update_product)) {
                echo $update_product;
            }       
        ?>     
        <?php 
            $get_product_by_id = $pd->getproductID($id);
                if($get_product_by_id)
                {
                    while ($resultProduct = $get_product_by_id->fetch_assoc()) 
                    {
         ?>          
         <!-- dung de them hinh anh  -->
          <form action=""  method="post" enctype="multipart/form-data" >
            <table class="form">
                <tr>
                    <td>
                        <label>Tên sản phẩm</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo $resultProduct['productName'] ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Danh mục</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>Chọn danh mục</option>
                            <?php 
                                $cat = new category();
                                $catList = $cat->show_category();
                                if ($catList) {
                                   while ($result = $catList->fetch_assoc()) {
                            ?>
                            <option
                            <?php
                                if ($result['catID'] == $resultProduct['catID']) 
                                {
                                    echo 'selected';
                                }    
                            ?> 
                            value="<?php echo $result['catID'] ?>"><?php echo $result['catName'] ?></option>
                          <?php 
                           }
                        } 
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Thương hiệu</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>Chọn thương hiệu</option>
                            <?php 
                                $brand = new Brand();
                                $brandList = $brand->show_brand();
                                if ($brandList) {
                                   while ($result = $brandList->fetch_assoc()) 
                                   {
                            ?>
                            <option 
                            <?php
                                if ($result['brandID'] == $resultProduct['brandID']) 
                                {
                                    echo 'selected';
                                }    
                            ?> 
                            value="<?php echo $result['brandID'] ?>"><?php echo $result['brandName'] ?></option>
                          <?php 
                           }
                        } 
                            ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả</label>
                    </td>
                    <td>
                        <textarea name="product_desc" class="tinymce"><?php echo $resultProduct['product_desc'] ?> </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $resultProduct['price'] ?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload hình ảnh</label>
                    </td>
                    <td>
                        <img src="uploads/<?php echo $resultProduct['image']?>" alt="Image" width="80">
                        <br>
                        <input type="file" name="image"/>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Loại sản phẩm</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Chọn loại</option>
                            <?php 
                                if ($resultProduct['type'] ==1)
                                {
                            ?>
                             <option selected value="1">Nổi bật</option>
                            <option  value="0">Không nổi bật</option>
                            <?php  
                                }
                                else 
                                {
                            ?>
                            <option  value="1">Nổi bật</option>
                            <option selected  value="0">Không nổi bật</option>
                                <?php
                                }   
                                ?>
                        </select>
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


