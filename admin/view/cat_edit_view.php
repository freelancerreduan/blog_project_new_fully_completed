<?php
    include_once('class/function.php');
    $obj = new blog_project();

    // this code for edite page data show in databse
    if(isset($_GET['status'])) {
        if($_GET['status']=='edit'){
            $id =$_GET['id'];
            $display = $obj->category_old_data_show($id);
        }
    }

    if(isset($_POST['cat_update'])){
        $msg = $obj-> cat_updated($_POST);
    }
?>
<div class="cotainer">
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <?php if(isset($msg)){ echo "$msg"; } ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="add_cat">Add Category</label>
                <input type="text" class="form-control" name="u_cat_name" placeholder="<?php echo $display['cat_name']; ?>">
            </div>
            <div class="form-group">
                <label for="text">Category Type</label>
                <input type="text" class="form-control" name="u_cat_des" placeholder="<?php echo $display['cat_des']; ?>">
            </div>
            <input type="hidden" name="idno" value=" <?php echo $display['id']; ?>" > 
            <button type="submit" class="btn btn-danger btn-block" name="cat_update">Update Category</button>
            <a href="manage_cat.php" class="btn btn-primary btn-block" > View Category</a>
        </form>
    </div>
</div>
