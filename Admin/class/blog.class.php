<?php
require_once "common.php";

class Blog extends Common{
	public $id,$name,$title,$image,$created_by,$category,$created_date;

function listAllBlog($start){
	$sql = "select * from tbl_blog order by created_date desc limit $start,4";
	return $this->select($sql);
}
function listAllBlogforpage(){
	$sql = "select * from tbl_blog order by created_date desc ";
	return $this->select($sql);
}
function listBlogByID(){
	$sql = "select * from tbl_blog where id='$this->id' and status=1 ";
	return $this->select($sql);
}
function deleteBlog(){
	 $sql="delete from tbl_blog where id='$this->id'";
	return $this->delete($sql);
}
}
?>