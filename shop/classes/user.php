<?php
    // include_once '../lb/database.php';
    require_once('C:/xampp/htdocs/DA_PHP/shop/lb/database.php');
    // include_once '../helper/format.php';
    require_once('C:/xampp/htdocs/DA_PHP/shop/helper/format.php');
?>
<?php
    class user
    {   
        private $db;
        private $fm;
        public function __construct()
        {
           $this->db = new Database();
           $this->fm = new Format();
        }
    }
?>