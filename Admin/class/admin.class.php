<?php 
class Admin {
	public $id,$name,$email,$password,$username;

	function set($var,$value){
		$this->$var=$value;
	}
	function get($var){
		return $this->$var;
	}
		function login(){
		
			$this->password=$this->password;
			 $sql= "select *from tbl_admin where email='$this->email' and password='$this->password'";
		 $conn = new mysqli('localhost','root','','majorproject');
		 $res= $conn->query($sql);
		

		if($res->num_rows == 1) {
			
		$data= $res->fetch_object(); 
	session_start();

		$_SESSION['admin_email']=$this->email;
		$_SESSION['admin_username']=$data->username;
		$_SESSION['admin_name']=$data->name;

	 	header('location:welcome.php');

		 }else{
		 	return 'login failed';
		 }
		 }

		 function checkLoginStatus()
		 {
		 	@session_start();		
		 }
		 
	}	
	

?>