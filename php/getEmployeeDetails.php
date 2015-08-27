<?php
// This page with give the json response of all the employees
	include('./datalib.php'); 		
	$mysqli =  createDbSession();

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
	http_response_code(200);
	$mysqli->close();



?> 

