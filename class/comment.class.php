<?php
require_once "common.php";

class Comment extends Common{
	public $comment_id,$blog_id,$username,$email,$comment,$created_date;

function SaveComment(){
	$sql="insert into tbl_comments(blog_id,username,email,comment,created_date)
	values('$this->blog_id','$this->username','$this->email','$this->comment','$this->created_date')";
	return $this->insert($sql);
}

function listAllComment(){
	$sql = "select * from tbl_blog
			join tbl_comments
			on tbl_blog.blog_id=tbl_comments.blog_id
			where tbl_blog.blog_id='$this->blog_id' order by tbl_comments.created_date asc";
	return $this->select($sql);
}

function deletecomment(){
	$sql = "delete from tbl_comments where id='$this->id' ";
	return $this->delete($sql);
}
}
?>