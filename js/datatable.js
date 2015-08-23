/* Formatting function for row details - modify as you need */
function format ( d ) {
    // `d` is the original data object for the row
    return '<table class = "innerTable" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Employee Role:</td>'+
            '<td>'+d.field3+'</td>'+
        '</tr>'+
    '</table>';
}

$(document).ready(function() {
   var empTable =   $('#employee').DataTable( {
        "ajax": './staticdata.json',
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "employeeDetails":           null,
                "defaultContent": ''
            },
            { "data": "id" },
            { "data": "firstName" },
            { "data": "lastName" }, 
            { "data": "field1" },
            { "data": "field2" }
        ],
        "order": [[1, 'asc']]
    } );
     
    // Add event listener for opening and closing details
    $('#employee tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = empTable.row( tr );
 
        if ( row.child.isShown() ) {
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
} ); 