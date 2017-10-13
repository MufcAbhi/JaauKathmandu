<?php
require_once "common.php";

class UserPhoto extends Common{
	public $id,$image,$username,$created_date,$user_bio;

function SaveUserPhoto(){
	$sql= "update users
			set user_photo = '$this->image'
			where ID = '$this->id'";
	return $this->insert($sql);
}

function UpdateUserBio(){
	$sql= "update users
			set user_biography = '$this->user_bio'
			where ID = '$this->id'";
			$this->insert($sql);
			return 1;
}
}
?>