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

		<link rel="stylesheet"  href="https://cdn.datatables.net/1.10.8/css/dataTables.bootstrap.min.css">
		<link rel="stylesheet"  href="https://cdn.datatables.net/select/1.0.0/css/select.bootstrap.min.css">
		<link rel="stylesheet"  href="https://cdn.datatables.net/buttons/1.0.1/css/buttons.bootstrap.min.css">

		
		

		
	</head>
	<body>
		<body>
		<div class="span12 pagination-centered">
		    <span> Employee Role Management Page </span>
		</div>
		
		<div id = "mainContent">
			<table id="employee" class="table table-striped table-bordered">
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
	</body>
</html>