<?php 

$inputArray = array();
$inputArray = $_POST["data"];

include('./datalib.php'); 		
	$mysqli =  createDbSession();
	if ($mysqli->connect_errno) {
	    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

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
	$mysqli->close();

?> 

