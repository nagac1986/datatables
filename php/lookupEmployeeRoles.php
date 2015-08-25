<?php
$empId = $_GET["id"];
include('./datalib.php'); 		
	$mysqli =  createDbSession();
	if ($mysqli->connect_errno) {
	    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	$myquery = "select r.rolename ,  er.eid is not null hasrole from employee_role er right  JOIN  roles r on r.rid = er.rid and  er.eid=".$empId;
	$myArray = array();
	if ($result = $mysqli->query($myquery)) {
	    $tempArray = array();
	    while($row = $result->fetch_object()) {
	            $tempArray = $row;
	            array_push($myArray, $tempArray);
	        }

	         $output['data'] = $myArray;

	    echo json_encode($output);
	}

	$result->close();
	$mysqli->close();



?> 

