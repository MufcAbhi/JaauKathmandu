<?php
require_once "common.php";
class Activity extends Common{

function showEvent(){
	$sql = "select * from tbl_activity";
			return $this->select($sql);
	}
}