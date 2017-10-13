<?php
require_once"class/blog.class.php";
$blog= new Blog();
$blog->set('id',$_GET['id']);
$catdata=$blog->deleteBlog();
header('location:list_blog.php');
?>