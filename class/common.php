<?php 
class Common{
	function set($var,$value){
		$this->$var=$this->validate_input($value);
	}
	function get($var){
		return $this->$var;
}
function connect(){
	$this->conn= new mysqli('localhost','root','','majorproject');
}
function insert($sql){
	$this->connect();
	$this->conn->query($sql);
	if ($this->conn->insert_id !=0) {
		return $this->conn->insert_id;}
		else{
			return false;
		}
	}
	function select($sql){
		$this->connect();
		$res= $this->conn->query($sql);
		$data= array();
		if ($res->num_rows >0) {
		
		while ($row=$res->fetch_object()) {
		array_push($data,$row);
		}
	}
	return ($data) ;
}

	function delete($sql){
		$this->connect();
		if($this->conn->query($sql)){
			return true;
			}else{
				return false;
			} 
			}
	function validate_input($var){
		$this->connect();
		$this->conn->real_escape_string($var);
		return $var;
	}		

}
?>