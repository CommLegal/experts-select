<?php

	$servername = "localhost";
	$username = "comparem_view";
	$password = "CLadmin001!";
	$db = "comparem_cme";


/*
	$servername = "192.168.3.211";
	$username = "cme";
	$password = "CME001!";
	$db = "cme";
*/

	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	// echo "Connected successfully";
	
?>