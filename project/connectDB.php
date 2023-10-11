<?php
	$servername="localhost";
	$username="2030026123";
	$password="2030026123";
	$db="2030026123";

	//create connection
	$conn= new mysqli($servername,$username,$password,$db);
	
	//check connection
	if ($conn->connect_error){
		die("connection failed: ".$conn->connect_error);
	}

	return ($conn);
?>
