<?php
$title = "News Management";

require_once("header.php");
if (!isset($_SESSION['role']) && $_SESSION['role'] != 'admin') {
    header('location:permission.php');
}
require_once('class/category.class.php');
$category=new Category();
$catlist=$category->retrive();
// $data=$catlist[0];
// print_r($catlist);
require_once('class/news.class.php');
$news = new News();
if (isset($_POST['btnSave'])) {
    // echo "testing ";
    // print_r($_POST);
    
    $err = [];
    if (isset($_POST['title']) && !empty($_POST['title'])) {
        // $user->=$_POST['name'];
        $news->set('title', $_POST['title']);
        
    } else {
        $err['title'] = "Enter Title";
    }
    if (isset($_POST['category_id']) ) {
        $news->set('category_id', $_POST['category_id']);
    } else {
        $err['category_id'] = 'Enter category_id';
    }
    if (isset($_POST['short_description'])) {
        $news->set('short_description', $_POST['short_description']);
    } else {
        $err['short_description'] = 'Enter short_description';
    }
    if (isset($_POST['description'])) {
        $news->set('description', $_POST['description']);
    } else {
        $err['description'] = 'Enter description';
    }
 
    // print_r($_FILES);
    if(isset($_FILES['feature_image']['name']) && $_FILES['feature_image']['error'] == 0) {
        $filename=$_FILES['feature_image']['tmp_name'];
        $db_filename=$_FILES['feature_image']['name'];
        // $tm=md5(time());
        $tm=uniqid();
        $dest=$tm.'_'.$db_filename;
        // echo $dest;
        // die;
        if(move_uploaded_file($filename, 'images/'.$dest)){
            $news->set('feature_image',$dest);
        }
    }else{
        // echo "noe";
    }
    


    if (count($err) == 0) {
        // echo "no werror";
        $news->set('breaking_key',$_POST['breaking_key']);
        $news->set('created_date', date('Y-m-d H:i:s'));
        $news->set('created_by', "$_SESSION[username]");
    //   print_r($news);
    //   die;
       $status= $news->save();
       if(is_integer($status)){
            $msg="News iNserted with id $status";
       }else{
            $msg="News cannot Inserted";
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
                Create New News
            </div>
            <div class="panel-body">
                <div class="row mx-3 my-2">
                    <div class="col-lg-12">
                        <?php  if(isset($msg)){
                            echo $msg;
                        } ?>
                        <form action="" role="form" method="post" id="category_form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                            </div>
                            <div class="form-group">
                                <label for="">Category Name</label>
                                <Select name="category_id" class="form-control"  required>
                                    <option value="" >select Categroy</option>
                                    <?php foreach($catlist as $cat){
                                        ?>
                                                <option value="<?php echo $cat->id ?>"><?php echo $cat->name ?></option>
                                        <?php
                                    }
                                    ?>
                                </Select>
                            </div>
                            <div class="form-group">
                                <label for="">Short  Description</label>
                                <textarea type="text" name="short_description" class="form-control " placeholder="Enter Short Description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea type="text" name="description" class="form-control ckeditor" placeholder="Enter Description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Features  Images</label>
                                <input type="file" name="feature_image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Breaking Key</label>
                                <div class="radio">
                                    <label for="">
                                        <input type="radio" name="breaking_key" id="" value="1">Yes
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="">
                                        <input type="radio" name="breaking_key" id="" value="0" checked >NO
                                    </label>
                                </div>
                                <button type="submit" name="btnSave" class="btn btn-success">Save News</button>
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
<script src="js/ckeditor/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        // alert("hello");
        $('#category_form').validate();

    });
</script>