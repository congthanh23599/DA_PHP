<?php
    // include_once '../lb/database.php';
    require_once('C:/xampp/htdocs/DA_PHP/shop/lb/database.php');
    // include_once '../helper/format.php';
    require_once('C:/xampp/htdocs/DA_PHP/shop/helper/format.php');
?>
<?php
    class cart
    {   
        private $db;
        private $fm;
        public function __construct()
        {
           $this->db = new Database();
           $this->fm = new Format();
        }
        public function Add_To_Cart($quantity, $id, $UserID)
        {   
            $UserID = $this->fm->validation($UserID);// kiểm tra UserID
            $UserID = mysqli_real_escape_string($this->db->link, $UserID);
            $quantity = $this->fm->validation($quantity);// kiểm tra số lượng 
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);// kiểm tra số lượng ng dùng nhập
            $ID = mysqli_real_escape_string($this->db->link, $id);
            // $sID = session_id();
            $query = "SELECT * FROM tbl_product WHERE productID = '$id'"; 
            $result = $this->db->select($query)->fetch_assoc();
            // echo '<pre>';
            // echo print_r($result) ;// print_r in dạng chuỗi mảng
            // echo '</pre>';
            $image = $result["image"];
            $productName = $result["productName"];
            $price = $result["price"];
            // nếu đã thêm 1 sản phẩm vào r thì không cần mua nữa mà ng dùng chi cần vào giỏ hàng để update thôi
            $check_cart = "SELECT * FROM tbl_cart Where productID = '$ID'AND UserID ='$UserID'";
            if ($check_cart == false) 
            {    
                $msg = "<span class='error'>Sản phẩm đã thêm vào giỏ hàng rồi! </span>";
                return $msg;// trả về nếu sản phẩm đã có r
            }
            else
            {
                $query_insert = "INSERT INTO tbl_cart(productID, productName, price, quantity, image, UserID) 
                VALUES('$ID', '$productName', '$price', '$quantity', '$image', ' $UserID')";
    
                $insert_cart = $this->db->insert($query_insert);
                if ($insert_cart) {
                    header('Location:carts.php');//nếu như quay lại trang cart loi vi trc do da luu session_id r(id bị đè)
                } 
                else 
                {
                    header('Location:404.php');
                }
            }
        }
        public function get_product_cart()
        {   $userID = Session::get('user_ID');
            // $sID = session_id();
            $query = "SELECT * FROM tbl_cart Where UserID ='$userID'";
            $result = $this->db->insert($query);
            return $result;// trả về kết quả 
        }
        public function show_product_cart()
        {   
          //C1: thủ công bằng câu lệnh SQL
            // $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
            //  FROM tbl_product INNER JOIN tbl_category ON tbl_product.catID = tbl_category.catID
            //  INNER JOIN tbl_brand ON tbl_product.brandID = tbl_brand.brandID
            //  order by tbl_product.productID desc"; // desc lay theo id giam dan
        //   //C2:
        //      $query = "SELECT p.*, c.catName, b.brandName
        //      FROM tbl_product as p, tbl_category as c, tbl_brand  as b WHERE p.catID = c.catID AND p.brandID = b.brandID
        //      order by p.productID desc"; // desc lay theo id giam dan

            $query = "SELECT * FROM tbl_cart order by productID desc"; // desc lay theo id giam dan
            $result = $this->db->select($query);
            return $result;
        }
        public function update_SL_Cart($quantity, $cartID, $UserID)
        {   $UserID = mysqli_real_escape_string($this->db->link, $UserID);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);// kiểm tra số lượng ng dùng nhập
            $cartID = mysqli_real_escape_string($this->db->link, $cartID);
            $query = "UPDATE tbl_cart SET
                quantity = '$quantity'
               
                WHERE cartID = '$cartID' AND UserID = '$UserID' ";
         
           
            $result = $this->db->update($query);
            if ($result) {
                $msg = " <meta http-equiv='refresh' content='0; URL=?id=live'>";
                echo "<span class='success'>Sản phẩm đã được sửa số lượng vào giỏ hàng!</span> ";
                return $msg;// trả về nếu sản phẩm đã có r
               // header('Location:carts.php');
            } else {
                $msg = "<span class='error'>Sản phẩm không được sửa số lượng vào giỏ hàng! </span>";
                return $msg;// trả về nếu sản phẩm đã có r
            }
        }
        public function del_admin_cart($delid)
        { 
            $cartID = mysqli_real_escape_string($this->db->link, $delid);
            $query = "DELETE FROM tbl_cart WHERE cartID ='$cartID' "; 
            $result = $this->db->delete($query);
            if ($result) 
            {  
                 $alert = "<span class='success'> Xóa sản phẩm thành công</span>";
                return $alert;
                header('Location:cartlist.php');
            } 
            else 
            {
                $alert = "<span class='error'> Không xóa được sản phẩm</span>";
                return $alert;
            }
        }
        public function del_cart($delid)
        { 
            $cartID = mysqli_real_escape_string($this->db->link, $delid);
            $query = "DELETE FROM tbl_cart WHERE cartID ='$cartID' "; 
            $result = $this->db->delete($query);
            if ($result) 
            {  
                $alert = "<span class='success'> Xóa sản phẩm thành công</span>";
                return $alert;
                header('Location:carts.php');
            } 
            else 
            {
                $alert = "<span class='error'> Không xóa được sản phẩm</span>";
                return $alert;
            }
        }
        public function check_cart()
        {   $userID = Session::get('user_ID');
            // $sID = session_id();
            $query = "SELECT * FROM tbl_cart Where UserID ='$userID'";
            $result = $this->db->insert($query);
            return $result;// trả về kết quả }
        } 
        public function del_all_cart()
        {   $userID = Session::get('user_ID');
            // $sID = session_id();
            $userID = Session::get('user_ID');
            $query = "DELETE  FROM tbl_cart Where UserID ='$userID'";
            $result = $this->db->insert($query);
            return $result;// trả về kết quả }
        }
        public function insertOrder($userID)
        {
			// $sId = session_id();
            $userName = Session::get('user_Name');
            $Address = Session::get('Address');
			$query = "SELECT * FROM tbl_cart WHERE UserID = '$userID'";
			$get_product = $this->db->select($query);
			if($get_product){
				while($result = $get_product->fetch_assoc()){
					$productid = $result['productID'];
					
					$quantity = $result['quantity'];
					$price = $result['price'] * $quantity;
					$image = $result['image'];
					$userID = $userID;
					$query_order = "INSERT INTO tbl_order(productId,userName,UserID, quantity,price,image, address)
                     VALUES('$productid', '$userName', '$userID', '$quantity', '$price', '$image','$Address')";
					$insert_order = $this->db->insert($query_order);
				}
                header("Location:index.php");
			}


		}
        // table order
        public function del_admin_order($delid)
        { 
            $ID = mysqli_real_escape_string($this->db->link, $delid);
            $query = "DELETE FROM tbl_order WHERE ID ='$ID' "; 
            $result = $this->db->delete($query);
            if ($result) 
            {  
                $alert = "<span class='success'> Xóa đơn hàng thành công</span>";
                return $alert;
                header('Location:cartlist.php');
            } 
            else 
            {
                $alert = "<span class='error'> Không xóa được đơn hàng</span>";
                return $alert;
            }
        }
        public function show_order()
        { 
            $query = "SELECT * FROM tbl_order order by productID desc"; // desc lay theo id giam dan
            $result = $this->db->select($query);
            return $result;
        }
    }
?>