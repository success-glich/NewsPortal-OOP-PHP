<?php
require_once('class/category.class.php');
$category= new Category();
$category->set('id',$_GET['id']);
$data= $category->getCategoryById();
// print_r($data);
$catdata=$data[0];
// print_r($catdata);

?>
<?php
$title = "Edit Category";
require_once("header.php");
if (!isset($_SESSION['role']) && $_SESSION['role'] != 'admin') {
    header('location:permission.php');
}
require_once('class/category.class.php');
$catetgory = new Category();

if (isset($_POST['btnUpdate'])) {
    // echo "testing ";
    $err = [];
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        // $user->=$_POST['name'];
        $catetgory->set('name', $_POST['name']);
    } else {
        $err['name'] = "Enter name";
    }
    if (isset($_POST['rank']) && !empty($_POST['rank'])) {
        $catetgory->set('rank', $_POST['rank']);
    } else {
        $err['rank'] = 'Enter Rank';
    }
    if (isset($_POST['status'])) {
        $catetgory->set('status', $_POST['status']);
    } else {
        $err['status'] = 'Enter Status';
    }

    if (count($err) == 0) {
        // echo "no werror";
        $catetgory->set('modified_date', date('Y-m-d H:i:s'));
        $catetgory->set('modified_by', "$_SESSION[username]");
        $catetgory->set('id',$_GET['id']);
        //code to check login
        //    $status= $user->login();
        // echo "<pre>";
        // print_r($catetgory);
        // echo "</pre>";
       $status= $catetgory->edit();
       if(($status)){
            $msg="Category updated successfully ";
            ?>
            <script>
                alert("Category Updated Succesfully");
                window.location="list_category.php";
            </script>

            <?php
       }else{
            $msg="Category Doesnot updated ";
       }
    }
}
?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> <?php echo $title; ?></h1>

</div>
<!-- /.container-fluid -->
<div class="row" style="border:1px solid grey;">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="mx-1 panel-heading" style="background-color:#edecec;">
                Edit Category
            </div>
            <div class="panel-body">
                <div class="row mx-3 my-2">
                    <div class="col-lg-12">
                        <?php  if(isset($msg)){
                            echo $msg;
                        } ?>
                        <form action="" role="form" method="post" id="category_form">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo $catdata->name; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Rank</label>
                                <input type="number" name="rank" class="form-control" placeholder="Enter Rank" value="<?php echo $catdata->rank; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <div class="radio">
                                    <label for="">
                                        <input type="radio" name="status" id="" value="1" <?php if( $catdata->status==1){ echo "checked";} ?> >Active
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="">
                                        <input type="radio" name="status" id="" value="0" <?php if( $catdata->status==0){ echo "checked";} ?> >Deactive
                                    </label>
                                </div>
                                <button type="submit" name="btnUpdate" class="btn btn-success">Update Category</button>
                                <button type="submit" class="btn btn-default">Clear</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->



<?php
require_once("footer.php"); ?>
<script src="js/validation/dist/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        // alert("hello");
        $('#category_form').validate();

    });
</script>