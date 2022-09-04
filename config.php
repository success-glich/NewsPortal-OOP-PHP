<?php
define('ADMIN_FOLDER','admin');


// require_once '..'.ADMIN_FOLDER.'/class/category.class.php';
require_once ("../newsportal/admin/class/category.class.php");
$category= new Category();
require_once ADMIN_FOLDER.'/class/news.class.php';
$news= new News();


// require_once ADMIN_FOLDER.'/class/ads.php';
// $category= new Category();


?>