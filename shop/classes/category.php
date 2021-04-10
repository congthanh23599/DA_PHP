<?php
    //include_once '../lb/database.php';
    require_once('C:/xampp/htdocs/DA_PHP/shop/lb/database.php');
    // include_once '../helper/format.php';
    require_once('C:/xampp/htdocs/DA_PHP/shop/helper/format.php');
?>
<?php
    class category
    {   
        private $db;
        private $fm;
        public function __construct()
        {
           $this->db = new Database();
           $this->fm = new Format();
        }
        public function insert_category($catName)
        {   // kiem tra coi co tu khong hop le ko
            $catName = $this->fm->validation($catName);
      
            //dung bien ket noi vs co so du lieu
            $catName = mysqli_real_escape_string($this->db->link, $catName);
            //
            if (empty($catName) ) {
                $alert = "<span class='error'> Category khong duoc bo trong</span>";
                return $alert;
            }
            else 
            {
                $query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
                $result = $this->db->insert($query);
              if ($result) {
                $alert = "<span class='success'> them category thanh cong</span>";
                return $alert;
              } else {
                $alert = "<span class='error'> them category khong thanh cong</span>";
                return $alert;
              }
              
            }
        }

        public function show_category()
        {   
            $query = "SELECT * FROM tbl_category order by catID desc"; // desc lay theo id giam dan
            $result = $this->db->select($query);
            return $result;
        }
        public function show_category_front_end()
        {   
            $query = "SELECT * FROM tbl_category order by catID desc"; // desc lay theo id giam dan
            $result = $this->db->select($query);
            return $result;
        }
        public function getcatbyID($id)
        {
            $query = "SELECT * FROM tbl_category WHERE catID ='$id' "; 
            $result = $this->db->select($query);
            return $result;
        }
        public function productbycat($id)
        {
            $query = "SELECT * FROM tbl_product WHERE catID ='$id' order by catID desc LIMIT 8 "; 
            $result = $this->db->select($query);
            return $result;
        }
        public function get_name_cat($id)
        {
            $query = "SELECT tbl_product.*, tbl_category.catName, tbl_category.catID FROM tbl_product, tbl_category WHERE tbl_product.catID = tbl_category.catID AND tbl_product.catID  ='$id' LIMIT 1"; 
            $result = $this->db->select($query);
            return $result;
        }
        public function update_category($catName, $id)
        {
            // kiem tra coi co tu khong hop le ko
            $catName = $this->fm->validation($catName);
      
            //dung bien ket noi vs co so du lieu
            $catName = mysqli_real_escape_string($this->db->link, $catName);   
            $id = mysqli_real_escape_string($this->db->link, $id); 
            //
            if (empty($catName) ) {
                $alert = "<span class='error'> Category khong duoc bo trong</span>";
                return $alert;
            }
            else 
            {
                $query = "UPDATE tbl_category SET catName = '$catName' WHERE catID = '$id' ";
                $result = $this->db->update($query);
              if ($result) {
                $alert = "<span class='success'> Sửa category thanh cong</span>";
                return $alert;
              } else {
                $alert = "<span class='error'> Sửa category khong thanh cong</span>";
                return $alert;
              }
              
            } 

        }
        public function del_category($id)
        {
            $query = "DELETE FROM tbl_category WHERE catID ='$id' "; 
            $result = $this->db->delete($query);
            if ($result) 
            {
                $alert = "<span class='success'> Xóa category thanh cong</span>";
                return $alert;
            } 
            else 
            {
                $alert = "<span class='error'> Xóa category khong thanh cong</span>";
                return $alert;
            }
        }
    }
    
?>