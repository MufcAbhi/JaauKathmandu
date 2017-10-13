<?php
require_once "common.php";
class Blog extends Common{
	public $id,$name,$title,$image,$created_by,$category,$created_date,$currentuser,$currentid,$blog;

function SaveBlog(){
	$sql="insert into tbl_blog(blog,title,image,created_by,category,created_date)
	values('$this->blog','$this->title','$this->image','$this->created_by','$this->category','$this->created_date')";
	$this->insert($sql);
	return 1;
	}
function RelatedBlog(){
	$sql = "select * from tbl_blog where created_by= '$this->created_by' order by created_date desc";
	return $this->select($sql);
	}
// solo
function listAllBlogFood(){
	$sql = "select * from tbl_blog where category = 'Food' and created_by= '$this->currentuser' order by created_date desc";
	return $this->select($sql);
	}

function listAllBlogRecreation(){
	$sql = "select * from tbl_blog where category = 'Recreation' and created_by= '$this->currentuser' order by created_date desc";
	return $this->select($sql);
	}

function listAllBlogHotel(){
	$sql = "select * from tbl_blog where category = 'Hotels' and created_by= '$this->currentuser' order by created_date desc";
	return $this->select($sql);
	}

function listAllBlogParty(){
	$sql = "select * from tbl_blog where category = 'Party' and created_by= '$this->currentuser' order by created_date desc";
	return $this->select($sql);
	}

function listAllBlogReligion(){
	$sql = "select * from tbl_blog where category = 'ReligiousPlace' and created_by= '$this->currentuser' order by created_date desc";
	return $this->select($sql);
	}

// all
function listAllFood(){
	$sql = "select * from tbl_blog where category = 'Food' order by created_date asc";
	return $this->select($sql);
	}

function listAllRecreation(){
	$sql = "select * from tbl_blog where category = 'Recreation' order by created_date asc";
	return $this->select($sql);
	}

function listAllHotel(){
	$sql = "select * from tbl_blog where category = 'Hotels' order by created_date asc";
	return $this->select($sql);
	}

function listAllParty(){
	$sql = "select * from tbl_blog where category = 'Party' order by created_date asc";
	return $this->select($sql);
	}

function listAllReligion(){
	$sql = "select * from tbl_blog where category = 'ReligiousPlace' order by created_date asc";
	return $this->select($sql);
	}


// visit blog page
function showBlog(){
	$sql = "select * from tbl_blog where blog_id = '$this->currentid'";
	return $this->select($sql);
	}

function countComments(){
	$sql = "select count(tbl_comments.comment_id) as num from tbl_blog
			join tbl_comments
			on tbl_blog.blog_id=tbl_comments.blog_id
			where tbl_blog.blog_id='$this->currentid'
			group by tbl_blog.blog_id";
			return $this->select($sql);
}

function deleteBlog(){
	 $sql="delete from tbl_blog where ID='$this->id'";
	return $this->delete($sql);
	}
}
?>