<!-- This page with give the json response of all the employees-->
<?php
	include('./datalib.php'); 		
	$mysqli =  createDbSession();
	if ($mysqli->connect_errno) {
	    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	$myquery = "select e.eid, e.firstname, e.lastname, field1, field2  from employees e";
	$myArray = array();
	if ($result = $mysqli->query($myquery)) {
	    $tempArray = array();
	    while($row = $result->fetch_object()) {
	            $tempArray = $row;
	            array_push($myArray, $tempArray);
	        }

	         $output['aaData'] = $myArray;

	    echo json_encode($output);
	}

	$result->close();
	$mysqli->close();



?> 

