<?php 
   include_once('class/function.php');
   $obj = new blog_project();

    // this is code for ( admin login info chack) if admin info not valid! then go to Redirect( Login page );
   session_start();
   $id=$_SESSION['adminId'];
   if($id==null){
    header("location:index.php");
   }
   

    // this is code for (Admin Logout ) info check and go to Login page
   if(isset($_GET['adminlogout'])){
       if($_GET['adminlogout']=='logout'){
           $obj->logout();
       }
   }
?>





<?php include_once('incluids/header.php'); ?>
    <body class="sb-nav-fixed">
        <?php include_once('incluids/topNave.php'); ?>
        <div id="layoutSidenav">
          <?php include_once('incluids/sideNave.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                       <?php
                         if(isset($view)){
                            if($view=="dashboard"){
                                include('view/dashboard_view.php');
                            }
                            elseif($view=="add_cat"){
                                include('view/add_cat_view.php');
                            }
                            elseif($view=="manage_category"){
                                include('view/manage_cat_view.php');
                            }
                            elseif($view=="cat_edit"){
                                include('view/cat_edit_view.php');
                            }
                        }
                        ?>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    <?php include_once('incluids/javascript.php'); ?>