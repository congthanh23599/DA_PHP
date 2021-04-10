<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'?>
<?php 
    $cat = new category();
    if (!isset($_GET['catID']) || $_GET['catID']== null) {
      echo "<script>window.location='catlist.php'</script>";
    }else {
        $id = $_GET['catID'];
    }
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        // the request using post method
        $catName = $_POST['catName'];
        
        $updateCat = $cat->update_category($catName, $id) ;
    }

         
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục </h2>
                <?php 
                    if (isset($updateCat)) {
                        echo $updateCat;
                    } 
                    
                ?>
                <?php 
                    $get_cat_name = $cat-> getcatbyID($id);
                    if ($get_cat_name) {
                        while ($result = $get_cat_name->fetch_assoc()) {
                            # code...
                      
                ?>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['catName']?>" name="catName" placeholder="Sửa danh mục sản phẩm..." class="medium" />
                            </td>
                        </tr>
						<tr> 
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
<?php include 'inc/footer.php';?>