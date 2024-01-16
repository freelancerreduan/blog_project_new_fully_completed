<?php
include_once('class/function.php');
$obj = new blog_project();

$view_category = $obj->category_display();

// this code for (Category Delete )in database
if(isset($_GET['status'])){
    if($_GET['status']=='delet'){
        $id = $_GET('id');
        $msg = $obj-> category_delete($id);
    }
}

?>


<div class="container">
    <?php if(isset($msg)){ echo $msg; } ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Category Descripton</th>
                <th scope="col"> Action </th>
            </tr>
        </thead>
        <tbody>
            <?php while($view_info = mysqli_fetch_assoc($view_category)){ ?>
             <tr>
                <th scope="row"><?php echo $view_info['id']; ?></th>
                <td><?php echo $view_info['cat_name']; ?></td>
                <td><?php echo $view_info['cat_des']; ?></td>
                <td> 
                    <a href="edit_cat.php?status=edit&&id=<?php echo $view_info['id']; ?>" class="btn btn-success">Edit</a>
                    <a href="?status=delet&&id=<?php echo $view_info['id']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a href="add_cat.php" class="btn btn-block btn-primary"> Add Another Category </a>
</div>