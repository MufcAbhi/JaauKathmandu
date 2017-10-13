<?php
require_once "common.php";

class Comment extends Common{
	public $id,$blog_id,$title_id,$name,$email,$comment,$created_by,$created_date;

function deletecomment(){
	$sql = "delete from tbl_comment where id='$this->id' ";
	return $this->delete($sql);
}

function listComment(){
	$sql = "select * from tbl_comment order by created_date desc";
	return $this->select($sql);
}
}
?>