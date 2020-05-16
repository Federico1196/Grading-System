<?php 


	//MySQLi
	//connect to data base

$conn = mysqli_connect('localhost', 'shaun', '1234', 'grades');

//check the connection
	if (!$conn){
		echo 'Connection error: '.mysqli_connect_error();
	}

	$query_result = mysqli_query($conn, "SELECT * FROM gradestab");

?>