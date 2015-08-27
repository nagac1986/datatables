<?php
//This page with give the json assinged and unassigned roles for a given employee
$empId = $_GET["id"];
include('./datalib.php'); 		
	$mysqli =  createDbSession();

	$myquery = "select  r.rid as roleid, r.rolename ,  er.eid is not null hasrole from employee_role er right  JOIN  roles r on r.rid = er.rid and  er.eid=".$empId." order by r.rolename";
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
	http_response_code(200);
	$result->close();
	$mysqli->close();



?> 

