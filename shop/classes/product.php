<?php
    // require_once '../lb/database.php';
    // require_once '../helper/format.php';
    require_once('C:/xampp/htdocs/DA_PHP/shop/helper/format.php');
    require_once('C:/xampp/htdocs/DA_PHP/shop/lb/database.php');
?>
<?php
    class product
    {   
        private $db;
        private $fm;
        public function __construct()
        {
           $this->db = new Database();
           $this->fm = new Format();
        }
        public function insert_product($data,$files)
        {   
            //dung bien ket noi vs co so du lieu
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
           // $image = mysqli_real_escape_string($this->db->link, $data['image']);
            //kiem tra hinh anh va lay hinh anh cho vao forder uploads
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name= $_FILES['image']['name'];
            $file_size= $_FILES['image']['size'];
            $file_temp= $_FILES['image']['tmp_name'];
            //
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;
            //xu ly uploads hinh anh
            // $file_temp = $this->image['tmp_name'];
            // $user_file = $this->image['name'];
            // $timestamp= date("Y").date("m").date("d").date("h").date("i").date("s");
            // $filepath= "uploads/".$timestamp.$user_file;
            // if(move_uploaded_file($file_temp,$filepath)==false){
            //     //return true;
            // }
            if ($productName == "" || $category == "" || $brand == "" || $product_desc == "" || $price == "" || $type == "" || $file_name == "") {
                $alert = "<span class='error'> khong duoc bo trong</span>";
                return $alert;
            }
            else 
            {   move_uploaded_file($file_temp,$uploaded_image);
                $query = "INSERT INTO tbl_product(productName, catID, brandID, product_desc, type, price, image)
                 VALUES('$productName', '$category', '$brand', '$product_desc', '$type', '$price', '$unique_image')";
                $result = $this->db->insert($query);
              if ($result) {
                $alert = "<span class='success'> them san pham thanh cong</span>";
                return $alert;
              } else {
                $alert = "<span class='error'> them san pham khong thanh cong</span>";
                return $alert;
              }
            }
        }

        public function show_product()
        {   
          //C1: thủ công bằng câu lệnh SQL
            // $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
            //  FROM tbl_product INNER JOIN tbl_category ON tbl_product.catID = tbl_category.catID
            //  INNER JOIN tbl_brand ON tbl_product.brandID = tbl_brand.brandID
            //  order by tbl_product.productID desc"; // desc lay theo id giam dan
          //C2:
             $query = "SELECT p.*, c.catName, b.brandName
             FROM tbl_product as p, tbl_category as c, tbl_brand  as b WHERE p.catID = c.catID AND p.brandID = b.brandID
             order by p.productID desc"; // desc lay theo id giam dan

            //$query = "SELECT * FROM tbl_product order by productID desc"; // desc lay theo id giam dan
            $result = $this->db->select($query);
            return $result;
        }
        public function getproductID($id)
        {
            $query = "SELECT * FROM tbl_product WHERE productID ='$id' "; 
            $result = $this->db->select($query);
            return $result;
        }
        public function update_product($data, $files, $id)
        { 
            //dung bien ket noi vs co so du lieu
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            // $image = mysqli_real_escape_string($this->db->link, $data['image']);
            //kiem tra hinh anh va lay hinh anh cho vao forder uploads
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name= $_FILES['image']['name'];
            $file_size= $_FILES['image']['size'];
            $file_temp= $_FILES['image']['tmp_name'];
            //
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;
            
            //
            if ($productName == "" || $category == "" || $brand == "" || $product_desc == "" || $price == "" || $type == "" ) 
            {
              $alert = "<span class='error'> khong duoc bo trong</span>";
              return $alert;
            }
            else 
            {
              if (!empty($file_name)) // nếu ng dùng chọn ảnh
              {
                if ($file_size > 2048000000) 
                {
                  $alert = "<span class='errod'> file không thể lớn hơn 2 MB</span>";
                  return $alert;
                } 
                elseif (in_array($file_ext, $permited) === false) 
                {
                  $alert = "<span class='errod'>Bạn chỉ có thể up file:".implode(', ',$permited)."</span>";
                  return $alert;
                }
                else
                {move_uploaded_file($file_temp,$uploaded_image);
                  $query = "UPDATE tbl_product SET
                  productName = '$productName',
                  brandID = '$brand',
                  catID = '$category',
                  product_desc = '$product_desc',
                  type = '$type',
                  price = '$price',
                  image = '$unique_image' 
                  WHERE productID = '$id' ";
                  $result = $this->db->update($query);
                  if ($result) 
                  {
                    $alert = "<span class='success'> Sửa sản phẩm  thanh cong</span>";
                    return $alert;
                  } 
                  else 
                  {
                    $alert = "<span class='error'> Sửa sản phẩm  khong thanh cong</span>";
                    return $alert;
                  }
                }
                  
              }
              else   
              // nếu ng dùng ko chọn ảnh
              { move_uploaded_file($file_temp,$uploaded_image);
                $query = "UPDATE tbl_product SET
                productName = '$productName',
                brandID = '$brand',
                catID = '$category',
                product_desc = '$product_desc',
                type = '$type',
                image = '$unique_image' ,
                price = '$price'
                WHERE productID = '$id' ";
                 $result = $this->db->update($query);
                 if ($result) 
                 {
                   $alert = "<span class='success'> Sửa sản phẩm  thanh cong</span>";
                   return $alert;
                 } 
                 else 
                 {
                   $alert = "<span class='error'> Sửa sản phẩm  khong thanh cong</span>";
                   return $alert;
                 }
              } 
            }
        }
        public function del_product($id)
        {
          $query = "DELETE FROM tbl_product WHERE productID ='$id' "; 
          $result = $this->db->delete($query);
          if ($result) 
          {
              $alert = "<span class='success'> Xóa sản phẩm thanh cong</span>";
              return $alert;
          } 
          else 
          {
            $alert = "<span class='error'> Xóa sản phẩm khong thanh cong</span>";
            return $alert;
          }
        }
        //font-end
        public function getprodut_NoiBat()
        {
            $query = "SELECT * FROM tbl_product WHERE type ='1' "; 
            $result = $this->db->select($query);
            return $result;
        }
        public function getprodut_Moi()
        {
            $query = "SELECT * FROM tbl_product order by productID  desc LIMIT 4"; //desc là giảm dần và giới hạn 4 sản  phẩm
            $result = $this->db->select($query);
            return $result;
        }
        public function get_details($id)
        {
           $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
             FROM tbl_product INNER JOIN tbl_category ON tbl_product.catID = tbl_category.catID
             INNER JOIN tbl_brand ON tbl_product.brandID = tbl_brand.brandID
             WHERE tbl_product.productID = '$id'"; // desc lay theo id giam dan
            $result = $this->db->select($query);
            return $result;
        }
    }
    
?>