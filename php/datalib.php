<?php
error_reporting(0);
	// Function for creating db session. Its the responsibility of the calling method to close te connection.
	function createDbSession() {
		$hostname = "localhost";
		$username = "root";
		$password = "";
		$schema = "employee";

		$mysqli =  new mysqli($hostname, $username, $password, $schema);
		if ($mysqli->connect_errno) {
		    $output['result'] = 'There is a problem with our servers we are trying to debug. Please bare with us, We would be back up shortly.';
		    http_response_code(500);
		    die(json_encode($output));
		}
		return $mysqli;
	}


?> 

