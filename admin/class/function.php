<?php
    class blog_project{
        private $conn;
        public function __construct()
        {
            $dbhost ='localhost';
            $dbuser ='root';
            $dbpass ="";
            $dbname ='blog_project';
            $this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
            if(!$this->conn){
                die ("Connection Faild!");
            }
        }

        
        // it's function for admin login In website
        public function admin_login($data){
            $email = $data['admin_email'];
            $pass = md5($data['admin_pass']);
            $query= "SELECT * FROM  admin_info WHERE admin_email='$email' && admin_pass='$pass'";

            if(mysqli_query($this->conn, $query)){
                $admin_info =mysqli_query($this->conn, $query);
                if($admin_info){
                    header("location:dashboard.php");
                    $admin_login = mysqli_fetch_assoc($admin_info);
                    session_start();    
                    $_SESSION['adminId'] = $admin_login['id'];
                    $_SESSION['adminEmail'] = $admin_login['admin_email'];
                }
            }
        }


        // it's function for admin (logout) from Dashboard
        public function logout(){
            unset($_SESSION['adminId']);
            unset($_SESSION['adminEmail']); 
            header("location:index.php");
        }
    }

?>