<?php
require_once "common.php";

class Follow extends Common{
	public $username, $followName;

	function selectFollow(){
		$sql="select * from tbl_follow
			where Username='$this->username' and FollowName='$this->followName'";
		return $this->select($sql);
	}

	function SetFollow(){
			$sql="insert into tbl_follow(Username,FollowName)
				values('$this->username','$this->followName')";
			$this->insert($sql);
			return 1;
		}
		
	function UnsetFollow(){
		$sql="delete from tbl_follow
		where Username='$this->username' and FollowName='$this->followName'";
		return $this->delete($sql);
	}
}