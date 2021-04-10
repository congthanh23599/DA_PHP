<?php
    require_once '../lb/database.php';
    require_once '../helper/format.php';
?>
<?php
    class Brand
    {   
        private $db;
        private $fm;
        public function __construct()
        {
           $this->db = new Database();
           $this->fm = new Format();
        }
        public function insert_brand($brandName)
        {   // kiem tra coi co tu khong hop le ko
            $brandName = $this->fm->validation($brandName);
      
            //dung bien ket noi vs co so du lieu
            $brandName = mysqli_real_escape_string($this->db->link, $brandName);
            //
            if (empty($brandName) ) {
                $alert = "<span class='error'> Thương hiệu khong duoc bo trong</span>";
                return $alert;
            }
            else 
            {
                $query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
                $result = $this->db->insert($query);
              if ($result) {
                $alert = "<span class='success'> them thương hiệu thanh cong</span>";
                return $alert;
              } else {
                $alert = "<span class='error'> them thương hiệu khong thanh cong</span>";
                return $alert;
              }
              
            }
        }

        public function show_brand()
        {   
            $query = "SELECT * FROM tbl_brand order by brandID desc"; // desc lay theo id giam dan
            $result = $this->db->select($query);
            return $result;
        }
        public function getbrandbyID($id)
        {
            $query = "SELECT * FROM tbl_brand WHERE brandID ='$id' "; 
            $result = $this->db->select($query);
            return $result;
        }
        public function update_brand($brandName, $id)
        {
            // kiem tra coi co tu khong hop le ko
            $brandName = $this->fm->validation($brandName);
      
            //dung bien ket noi vs co so du lieu
            $brandName = mysqli_real_escape_string($this->db->link, $brandName);   
            $id = mysqli_real_escape_string($this->db->link, $id); 
            //
            if (empty($brandName) ) {
                $alert = "<span class='error'> thương hiệu khong duoc bo trong</span>";
                return $alert;
            }
            else 
            {
                $query = "UPDATE tbl_brand SET brandName = '$brandName' WHERE brandID = '$id' ";
                $result = $this->db->update($query);
              if ($result) {
                $alert = "<span class='success'> Sửa thương hiệu thanh cong</span>";
                return $alert;
              } else {
                $alert = "<span class='error'> Sửa thương hiệu khong thanh cong</span>";
                return $alert;
              }
              
            } 

        }
        public function del_brand($id)
        {
            $query = "DELETE FROM tbl_brand WHERE brandID ='$id' "; 
            $result = $this->db->delete($query);
            if ($result) 
            {
                $alert = "<span class='success'> Xóa thương hiệu thanh cong</span>";
                return $alert;
            } 
            else 
            {
                $alert = "<span class='error'> Xóa thương hiệu khong thanh cong</span>";
                return $alert;
            }
        }
    }
    
?>