<?php
    require_once '../lb/session.php';
    Session::checkLogin();
    require_once '../lb/database.php';
    require_once '../helper/format.php';
?>
<?php
    class adminlogin
    {   
        private $db;
        private $fm;
        public function __construct()
        {
           $this->db = new Database();
           $this->fm = new Format();
        }
        public function login_admin($adminUser, $adminPass)
        {   // kiem tra coi co tu khong hop le ko
            $adminUser = $this->fm->validation($adminUser);
            $adminPass = $this->fm->validation($adminPass);
            //dung bien ket noi vs co so du lieu
            $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
            $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);
            //
            if (empty($adminUser) || empty($adminPass)) {
                $alert = "tai khoan va mat khau khong dc bo trong";
                return $alert;
            }
            else 
            {
                $query = "SELECT * FROm tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass' LIMIT 1 ";
                $result = $this->db->select($query);
                if ($result != false) {
                    $value = $result->fetch_assoc();
                    Session::set('adminlogin', true);
                    Session::set('adminID', $value['adminID']);
                    Session::set('adminUser', $value['adminUser']);
                    Session::set('adminName', $value['adminName']);
                    header('Location:index.php');// xu ly xong quay va trang admin index
                }
                else 
                {
                    $alert = "tai khoan va mat khau khong dung";
                }
            }
        }
        
    }
    
?>