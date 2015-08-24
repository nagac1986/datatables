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




function drawTable($queryString){
	$result = mysql_query($queryString);
	if (!$result)
	{
		die("Error with select SQL query attempt: (note below)  <p>" . mysql_error());
	}
	echo "<table border=1>";
	echo "<tr>";
	$i=0;
	$colnames = mysql_fetch_assoc($result);
	foreach($colnames as $name => $value) {
		echo "<th >" . $name  . "</th>";
		$dataArray[$i]=$name;
		$i++;
	}
	echo "</tr>";
	mysql_data_seek($result,0);
	while($row = mysql_fetch_array($result))
	{
		echo "<tr>";
		echo generatetd($dataArray,$row);
		echo "</tr>";
	}
	echo "</table>";
}

function generatetd( $options = array(), $row =array() ) {
    $html = "";
    foreach ($options as $option => $value) {
		$html .= "<td  >" . $row[$value] . "</td>";
    }
    return $html;
}


?> 

