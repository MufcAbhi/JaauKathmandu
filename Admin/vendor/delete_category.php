<?php
require_once"class/category.class.php";
$category= new Category();
$category->set('id',$_GET['id']);
$category->deleteCategory();
header('location:list_category.php');
?>