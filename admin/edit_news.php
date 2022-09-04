<?php
$title = "News Management";

require_once("header.php");
if (!isset($_SESSION['role']) && $_SESSION['role'] != 'admin') {
    header('location:permission.php');
}
require_once('class/news.class.php');
// $category=new Category();
$nid = $_GET['id'];
$news = new News();
$news->set('id', $nid);
$newslist = $news->getNewsByID();
// $news->set('id',$nid);
$newslist = $newslist[0];
// print_r($newslist);

require_once('class/category.class.php');
$category = new Category();
$catlist = $category->retrive();

if (isset($_POST['btnUpdate'])) {
    // echo "testing ";
    // print_r($_POST);

    $err = [];
    if (isset($_POST['title']) && !empty($_POST['title'])) {
        // $user->=$_POST['name'];
        $news->set('title', $_POST['title']);
    } else {
        $err['title'] = "Enter Title";
    }
    if (isset($_POST['category_id'])) {
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
    // $fanswer=$_FILES["fanswer"]["name"];
    // // echo $fanswer;
    // $fimage=$_FILES['fopt1']['name'];

    $db_filename = $_FILES['feature_image']['name'];
    if ($db_filename != "") {
        $tm = uniqid();
        $filename = $_FILES['feature_image']['tmp_name'];

        // $dst1 = "./opt_images/.$tm.$opt1";
        $dest = $tm . '_' . $db_filename;


        // $qn=$_POST['question']
        // $sql = "update questions set question='$_POST[fquestion]',opt1='$dst_db1' where id=$id;";
        // mysqli_query($conn, $sql);
        //  echo 'true';
        if (move_uploaded_file($filename, 'images/' . $dest)) {
            $news->set('feature_image', $dest);
        }

    } 
    
  



    if (count($err) == 0) {
        // echo "no werror";
        $news->set('id',$nid);
        $news->set('breaking_key',$_POST['breaking_key']);
        $news->set('modified_date', date('Y-m-d H:i:s'));
        $news->set('modified_by', "$_SESSION[username]");
    //   print_r($news);
    //   die;
       $status= $news->edit();
       if(($status)){
            ?>
            <script>
                alert("News Updated successfully");
                window.location.href=window.location.href;
            </script>

<?php
            $msg="News Upddated successfully";

       }else{
            $msg="News cannot updated";
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
                Edit News
            </div>
            <div class="panel-body">
                <div class="row mx-3 my-2">
                    <div class="col-lg-12">
                        <?php if (isset($msg)) {
                            echo $msg;
                        } ?>
                        <form action="" role="form" method="post" id="category_form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Title" value="<?php echo $newslist->title; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Category Name</label>
                                <Select name="category_id" class="form-control" required>

                                    <?php foreach ($catlist as $cat) {
                                    ?>
                                        <option value="<?php echo $cat->id ?>" <?php if ($cat->id == $newslist->category_id) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $cat->name ?></option>
                                    <?php
                                    }
                                    ?>
                                </Select>
                            </div>
                            <div class="form-group">
                                <label for="">Short Description</label>
                                <textarea type="text" name="short_description" class="form-control" placeholder="Enter Short Description" required><?php echo  $newslist->short_description; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea type="text" name="description" class="form-control ckeditor" placeholder="Enter Description" required> <?php echo $newslist->description; ?></textarea>
                            </div>
                            <div class="form-group">
                                <div class="image">
                                    <img src="images/<?php echo $newslist->feature_image; ?>" alt="news images" width="100" height="100">
                                </div>
                                <label for="">Features Images</label>
                                <input type="file" name="feature_image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Breaking Key</label>
                                <div class="radio">
 
                                    <label for="">
                                        <input type="radio" name="breaking_key" id="" value="1" <?php if($newslist->breaking_Key==1){echo "checked";} ?> >Yes
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="">
                                        <input type="radio" name="breaking_key" id="" value="0"  <?php if($newslist->breaking_Key==0){echo "checked";} ?>>NO
                                    </label>
                                </div>
                                <button type="submit" name="btnUpdate" class="btn btn-success">Update News</button>
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