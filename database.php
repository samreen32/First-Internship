<?php

class Database{
	private $connection;
	function __construct()
	{
		$this->connect_db();
	}
 
	public function connect_db(){
		$this->connection = mysqli_connect('localhost','root','','form');
	
		if(mysqli_connect_error()){
			die("<hr> <br>Database Connection Failed<br>" . mysqli_connect_error() ."<br>". mysqli_connect_errno());
		}
	}
 
	public function create($title, $fname, $lname, $gender, $address, $address2, $city, $state, $zip, $textarea){
		$sql = "INSERT INTO `task` (title, first_name, last_name, gender, address, address2, city, state, zip, textarea) 
		VALUES ('$title', '$fname', '$lname', '$gender', '$address', '$address2', '$city', '$state', '$zip', '$textarea')";
		$res = mysqli_query($this->connection, $sql);
		if($res){
	 		return true;
		}else{
			die("err".mysqli_error($this->connection));
			return false;
		}
	}
 
	public function sanitize($var){
		$return = mysqli_real_escape_string($this->connection, $var);
		return $return;
	}
 
}
 
$database = new Database();
 
?>