<?php
require_once "../admin/class/news.class.php";
$news =new News();
$news->set('id',$_GET['id']);
$news->remove();



?>