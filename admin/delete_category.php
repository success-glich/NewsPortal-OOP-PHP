<?php
require_once "class/category.class.php";
$category=new Category();
$category->set('id',$_GET['id']);
// print_r($category);
$category->remove();

?>