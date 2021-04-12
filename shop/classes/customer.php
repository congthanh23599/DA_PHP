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
                    Session::set('Address',  $value['Address']);
                    header('Location:index.php');
                    //session_destroy();
                } 
                else 
                {
                    $alert = "<div class='alert alert-danger' role='alert'> Email hoặc Password không trùng khớp</div>";
                    return $alert;
                   
                }
                

            }
        }
        public function show_ALL_customer()
        {   
            $query = "SELECT * FROM tbl_user ";
            $result = $this->db->select($query);
            return $result;
        }
        public function del_user($id)
        {
          $query = "DELETE FROM tbl_user WHERE ID ='$id' "; 
          $result = $this->db->delete($query);
          if ($result) 
          {
              $alert = "<span class='success'> Xóa thanh cong</span>";
              return $alert;
          } 
          else 
          {
            $alert = "<span class='error'> Xóa khong thanh cong</span>";
            return $alert;
          }
        }
        public function getUserID($id)
        {
            $query = "SELECT * FROM tbl_user WHERE ID ='$id' "; 
            $result = $this->db->select($query);
            return $result;
        }
        public function update_user($data,  $id)
        { 
            //dung bien ket noi vs co so du lieu
            //$ID = mysqli_real_escape_string($this->db->link, $data['ID']);
            $Name = mysqli_real_escape_string($this->db->link, $data['Name']);
            $Address = mysqli_real_escape_string($this->db->link, $data['Address']);
            $Phone = mysqli_real_escape_string($this->db->link, $data['Phone']);
            $Gender = mysqli_real_escape_string($this->db->link, $data['Gender']);
            $Email = mysqli_real_escape_string($this->db->link, $data['Email']);
            $Password = mysqli_real_escape_string($this->db->link, $data['Password']);
      
            if ($Name == "" || $Address == "" || $Phone == "" || $Gender == "" || $Email == "" || $Password == ""  ) 
            {
              $alert = "<span class='error'> khong duoc bo trong</span>";
              return $alert;
            }
            else 
            {
                  $query = "UPDATE tbl_user SET
                  Name = '$Name',
                  Address = '$Address',
                  Phone = '$Phone',
                  Gender = '$Gender',
                  Email = '$Email',
                  Password = '$Password'
                  WHERE ID = '$id' ";
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
        // front-end
        public function getThongTinUsser($id)
        {
            $query = "SELECT * FROM tbl_user WHERE ID = '$id'"; 
            $result = $this->db->select($query);
            return $result;
        }
        public function show_customers($id){
			$query = "SELECT * FROM tbl_user WHERE ID='$id'";
			$result = $this->db->select($query);
			return $result;
		}
        // cập nhật thông tin cá nhân của user
        public function update_customers($data, $id){
			$name = mysqli_real_escape_string($this->db->link, $data['Name']);
			$gender = mysqli_real_escape_string($this->db->link, $data['Gender']);
			$email = mysqli_real_escape_string($this->db->link, $data['Email']);
			$address = mysqli_real_escape_string($this->db->link, $data['Address']);
			$phone = mysqli_real_escape_string($this->db->link, $data['Phone']);
			
			if($name=="" || $gender=="" || $email=="" || $address=="" || $phone ==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_user SET Name='$name',Gender='$gender',Email='$email',Address='$address',Phone='$phone' WHERE ID ='$id'";
				$result = $this->db->insert($query);
				if($result){
						$alert = "<span class='success'>Cập nhập thành công </span>";
						return $alert;
				}else{
						$alert = "<span class='error'>cập nhập thất bại</span>";
						return $alert;
				}
				
			}
		}
		
    
    }
?>