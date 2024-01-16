<?php
    include_once('class/function.php');
    $obj = new blog_project();

    if(isset($_POST['add_cat'])){
        $msg = $obj-> add_category($_POST);
    }

?>
<div class="cotainer">
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <?php if(isset($msg)){ echo "$msg"; } ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="add_cat">Add Category</label>
                <input type="text" class="form-control" name="cat_name" placeholder="Enter category name">
            </div>
            <div class="form-group">
                <label for="text">Category Type</label>
                <input type="text" class="form-control" name="cat_des" placeholder="Enter Category Description">
            </div>

            <button type="submit" class="btn btn-primary btn-block" name="add_cat">Add Category</button>
            <a href="manage_cat.php" class="btn btn-primary btn-block" > View Category</a>
        </form>
    </div>
</div>