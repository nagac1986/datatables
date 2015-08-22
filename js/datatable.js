$(document).ready(function() {
	alert('On Page Load !!!!!!!!!!');
    $('#employee').DataTable( {
        "ajax": '../staticdata.json'
    } );
} );