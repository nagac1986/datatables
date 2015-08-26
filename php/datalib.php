<?php



function createDbSession() {
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$schema = "employee";

	$mysqli =  new mysqli($hostname, $username, $password, $schema);
	if ($mysqli->connect_errno) {
	    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	return $mysqli;
}


?> 

