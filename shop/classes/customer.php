<?php
    // include_once '../lb/database.php';
    require_once('C:/xampp/htdocs/DA_PHP/shop/lb/database.php');
    // include_once '../helper/format.php';
    require_once('C:/xampp/htdocs/DA_PHP/shop/helper/format.php');
?>
<?php
    class customer
    {   
        private $db;
        private $fm;
        public function __construct()
        {
           $this->db = new Database();
           $this->fm = new Format();
        }
       public function insert_Customer($data)
        {
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $gender = mysqli_real_escape_string($this->db->link, $data['gender']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $password = mysqli_real_escape_string($this->db->link, $data['password']);
            if ($name == "" || $email == "" || $phone == "" || $gender == "" || $address == "" || $password == "" ) 
            {
                $alert = "<div class='alert alert-danger' role='alert'>khong duoc bo trong</div>";
                return $alert;
            }
            else
            {
                $check_email = "SELECT * FROM tbl_user WHERE Email='$email'  LIMIT 1";
                $result_check = $this->db->select($check_email);
                if ($result_check) 
                {
                    $alert = "<div class='alert alert-danger' role='alert'> Email đã được sử dụng</div>";
                    return $alert;
                } 
                else 
                {
                    $query = "INSERT INTO tbl_user(Name, Address, Phone, Gender, Email, Password)
                    VALUES('$name', '$address', '$phone', '$gender', '$email', '$password')";
                    $result = $this->db->insert($query);
                    if ($result) {
                    $alert = "<div class='alert alert-success' role='alert'> Đăng ký thành công</div>";
                    return $alert;
                    } else {
                    $alert = "<div class='alert alert-danger' role='alert'>Đăng ký thất bại</div>";
                    return $alert;
                    }
                }
                

            }
        }
        public function login_Customer($data)
        {   
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $password = mysqli_real_escape_string($this->db->link, $data['password']);
            if (empty($email) ||empty($password)) 
            {
                $alert = "<div class='alert alert-danger' role='alert'>khong duoc bo trong</div>";
                return $alert;
            }
            else
            {
                $check_login = "SELECT * FROM tbl_user WHERE Email='$email' AND Password='$password' ";
                $result_check = $this->db->select($check_login);
                if ($result_check) 
                {   session_start();
                    $value = $result_check->fetch_assoc();
                    Session::set('user_login', true);
                    Session::set('user_ID', $value['ID']);
                    Session::set('user_Name',  $value['Name']);
                
                    header('Location:order.php');
                    session_destroy();
                } 
                else 
                {
                    $alert = "<div class='alert alert-danger' role='alert'> Email hoặc Password không trùng khớp</div>";
                    return $alert;
                   
                }
                

            }
        }
    }
?>