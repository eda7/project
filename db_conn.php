<?php
	$servername = "localhost";
	$username = "faridibin";
	$password = "hamzazara";
	$dbname = "smarthealth";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password,$dbname);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

?>