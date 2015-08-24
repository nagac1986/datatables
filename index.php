<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title>Employee management</title>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="./js/datatable.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		
		<link rel="stylesheet"  href="https://cdn.datatables.net/1.10.8/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet"  href="./css/employee.css">
		
	</head>
	<body>
		<body>
		<div id = "mainContent">

			<table id="employee" class="display" >
		        <thead>
		            <tr>
		            	<th></th>
		                <th>Id</th>
		                <th>First Name</th>
		                <th>Last Name</th>
		                <th>Field1</th>
		                <th>Field2</th>
		            </tr>
		        </thead>
		    </table>
	    </div>


<?php
	include('./php/datalib.php');
	$con =createDbSession();
?> 

	    
	</body>
</html>