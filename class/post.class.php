<?php
require_once "common.php";

class Updates extends Common{
	public $id,$post,$created_date,$username;

function SavePost(){
	$sql="insert into tbl_post(ID,post,created_date)
	values('$this->id','$this->post','$this->created_date')";
	return $this->insert($sql);
}

function listAllPost(){
	$sql = "select users.UserName, users.user_photo, tbl_post.created_date,
			tbl_post.post
			from users
			join tbl_post
			on tbl_post.ID=users.ID
			join tbl_follow
			on users.UserName=tbl_follow.FollowName
			where tbl_follow.Username='$this->username' or users.UserName='$this->username'
			group by tbl_post.post_id
			order by tbl_post.created_date asc";
			return $this->select($sql);
}

// function listUserPost(){
// 		$sql = "select users.UserName, users.user_photo, tbl_post.post, tbl_post.created_date
// 			from users
// 			join tbl_post
// 			on tbl_post.ID=users.ID
// 			where users.UserName='$this->username'
// 			order by tbl_post.created_date desc
// 			limit 1";
// 			return $this->select($sql);
// 		}

function listAllRelatedPhoto(){
	$sql = "select * from users
			where users.UserName='$this->username'";
			return $this->select($sql);
		}

function listAllRelatedPost(){
	$sql = "select users.UserName, users.user_photo, tbl_post.post, tbl_post.created_date
			from users
			join tbl_post
			on tbl_post.ID=users.ID
			where users.UserName='$this->username'
			group by tbl_post.post_id
			order by tbl_post.post_id desc";
			return $this->select($sql);
		}
}
?>