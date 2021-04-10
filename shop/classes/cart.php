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
            $sID = session_id();
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
            if ($check_cart == true) 
            {    
                $msg = "<span class='error'>Sản phẩm đã thêm vào giỏ hàng rồi! </span>";
                return $msg;// trả về nếu sản phẩm đã có r
            }
            else
            {
                $query_insert = "INSERT INTO tbl_cart(productID, sID, productName, price, quantity, image, UserID) 
                VALUES('$ID', '$sID', '$productName', '$price', '$quantity', '$image', ' $UserID')";
    
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
        {
            $sID = session_id();
            $query = "SELECT * FROM tbl_cart Where sID ='$sID'";
            $result = $this->db->insert($query);
            return $result;// trả về kết quả 
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
                $msg = "<span class='success'>Sản phẩm đã được sửa số lượng vào giỏ hàng!</span> ";
                return $msg;// trả về nếu sản phẩm đã có r
                header('Location:carts.php');
            } else {
                $msg = "<span class='error'>Sản phẩm không được sửa số lượng vào giỏ hàng! </span>";
                return $msg;// trả về nếu sản phẩm đã có r
            }
        }
        public function del_cart($delid)
        { 
            $cartID = mysqli_real_escape_string($this->db->link, $delid);
            $query = "DELETE FROM tbl_cart WHERE cartID ='$cartID' "; 
            $result = $this->db->delete($query);
            if ($result) 
            {  
                //  $alert = "<span class='success'> Xóa sản phẩm thành công</span>";
                // return $alert;
                header('Location:carts.php');
            } 
            else 
            {
                $alert = "<span class='error'> Không xóa được sản phẩm</span>";
                return $alert;
            }
        }
        public function check_cart()
        {   $sID = session_id();
            $query = "SELECT * FROM tbl_cart Where sID ='$sID'";
            $result = $this->db->insert($query);
            return $result;// trả về kết quả }
        } 
        public function del_all_cart()
        {   $sID = session_id();
            $query = "DELETE  FROM tbl_cart Where sID ='$sID'";
            $result = $this->db->insert($query);
            return $result;// trả về kết quả }
        }
    }
?>