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
   
    // ==============================================Admin System Done======================================================





    // ============================================== Website Fully Function hear ==========================================

  
    // it's function for (Category Add) in database
    public function add_category($data){
        $cat_name = $data['cat_name'];
        $cat_des = $data['cat_des'];

        $query = "INSERT INTO category (cat_name,cat_des) VALUE ('$cat_name', '$cat_des')";
        if(mysqli_query($this->conn, $query)){
            return "Category Added Successfully";
            
        }
    }

  
    // it's function for (Category Manage) in database
    public function manage_category($data){
        $manage_cat_name = $data['manage_cat_name'];
        $manage_cat_des = $data['manage_cat_des'];

        $query = "INSERT INTO category (cat_name,cat_des) VALUE ('$manage_cat_name', '$manage_cat_des')";
        if(mysqli_query($this->conn, $query)){
            return "Category Updated Successfully";
            
        }
    }


    // it's function for (Category Display in Manage Category page ) from Database
    public function category_display(){
        $query = "SELECT * FROM category";
        if(mysqli_query($this->conn , $query)){
            $category_display = mysqli_query($this->conn , $query);
            return $category_display;
        }
    }


    // it's function for ( Edite page Data Display) in database
    public function category_old_data_show($id){
        $query = "SELECT * FROM category WHERE id= $id";
        if(mysqli_query($this->conn , $query)){
            $category_display = mysqli_query($this->conn , $query);
            $category_display = mysqli_fetch_assoc($category_display);
            return $category_display; 
        }
    }


    // it's function for ( Category Update ) in database
    public function cat_updated($data){
        $u_cat_name = $data['u_cat_name'];
        $u_cat_des = $data['u_cat_des'];
        $cat_idno = $data['idno'];
        $query = "UPDATE category SET cat_name='$u_cat_name', cat_des='$u_cat_des' WHERE id = $cat_idno ";
        if(mysqli_query($this->conn, $query)){
            return "New Data Updated Successfully";
        }
    }


    // it's function for (Category Delete ) in database
    public function category_delete($id){
        $query = "DELETE FROM category WHERE id = $id";
        if(mysqli_query($this->conn, $query)){
            return "Category Deleted Successfully";
        }
    }

}





?>