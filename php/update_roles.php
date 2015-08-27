
<?php 
	//This page with update the role relation ship for an employee
	$inputArray = array();
	$inputArray = $_POST["data"];

	include('./datalib.php'); 		
	$mysqli =  createDbSession();

	foreach ($inputArray as $value){
		$roleid =  $value["roleid"];
		$empid = $value["employeeid"];
		$assigned = $value["assigned"];


		if($assigned=='false'){
			$deleteQuery = "delete from employee_role where eid = ".$empid." and rid = ".$roleid;
			$result = $mysqli->query($deleteQuery);
		} else {
			$insertQuery = "insert into employee_role (eid, rid) values (".$empid.",".$roleid.")";
			$result = $mysqli->query($insertQuery);
		}
	}

	$output['result'] = 'success';
	http_response_code(201);
	echo json_encode($output);
	$mysqli->close();

?> 

