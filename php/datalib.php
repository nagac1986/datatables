<?php

function generateSelect($name = '', $options = array() , $select = '') {
	$html = '<select name="'.$name.'">';
	
	$html .= '<option value=></option>';
    foreach ($options as $option => $value) {
		if ($select == $value){
			$html .= '<option value=\''.$value.'\' selected=\'selected\'>'.$option.'</option>';
		}
		else{
			$html .= '<option value=\''.$value.'\' >'.$option.'</option>';
		}
    }
    $html .= '</select>';
    return $html;
}


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


function getEmployeeInfo() {			
	$mysqli =  createDbSession();
	if ($mysqli->connect_errno) {
	    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

    $myquery = "SELECT * from employees";
    $myArray = array();
    if ($result = $mysqli->query($myquery)) {
        $tempArray = array();
        while($row = $result->fetch_object()) {
                $tempArray = $row;
                array_push($myArray, $tempArray);
            }
        echo json_encode($myArray);
    }

    $result->close();
    $mysqli->close();
}



?> 

