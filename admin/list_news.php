<?php
$title = "List Category";
require_once("header.php");
if (!isset($_SESSION['role']) && $_SESSION['role'] != 'admin') {
    header('location:permission.php');
}
require_once("class/news.class.php");
$news = new News();
$data = $news->retrive();
// print_r($data);
?>
<link href="css/sb-admin-2.min.css" rel="stylesheet">

<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Category Mangement</h1>

</div>
<!-- /.container-fluid -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Category List</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>title</th>
                        <th>Short Description</th>
                        <!-- <th>Description</th> -->
                        <th>Feature Image</th>
                        <th>Action</th>

                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 1;
                    foreach ($data as $cl) {
                    ?>

                        <tr>
                        <td> <?php echo $i ?></td>
                        <td><?php echo $cl->title; ?></td>
                        <td><?php echo $cl->short_description; ?></td>
                        <!-- <td><?php echo $cl->description; ?></td> -->
                        <td><img src="images/<?php echo $cl->feature_image?>" alt="features Images" width="100" height="100"></td>
                      
                        <td class="center" style="display:flex; justify-content:center; text-align:center;">
                            <a href="edit_news.php?id=<?php echo $cl->id; ?>" class="btn btn-warning mx-3">Edit</a> 
                            <a href="delete_news.php?id=<?php echo $cl->id; ?>" class="btn btn-danger" onclick="return confirm ('Are you Sure to delete ? ')">Delete</a>
                            </td>
                        </tr>
                    <?php

                        $i++;
                    }


                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>



</div>
<!-- End of Main Content -->
<!-- Footer -->


<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>