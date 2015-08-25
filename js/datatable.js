/* Formatting function for row details - modify as you need */
function format ( d ) {

$.ajax({
    type: 'get',
    url: './php/lookupEmployeeRoles.php?id='+d.eid,
    success: function(data) {
         $table = '<table class = "innerTable" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
                '<fieldset> ' +
                    '<legend>Employee roles </legend>'+
                    '<form action="employeemap"> ' +
                        '<input type="checkbox" name="role" value="Administrator"> Admin <br> ' +
                        '<input type="checkbox" name="role" value="Administrator" checked /> Admin <br> ' +
                        '<input type="checkbox" name="role" value="Administrator"> Admin <br> ' +
                        '<input type="submit" value="Submit"> ' +
                    '</form>' +
                '</fieldset> ' +
            '</tr>'+
        '</table>'; 

        return $table;   
    }
});


   
}

$(document).ready(function() {
 
   var empTable =   $('#employee').DataTable( {
        "ajax": './php/getEmployeeDetails.php',
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "employeeDetails":           null,
                "defaultContent": ''
            },
            { "data": "eid" },
            { "data": "firstname" },
            { "data": "lastname" }, 
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
            //row.data().eid
             $.ajax({
            type: 'get',
            url: './php/lookupEmployeeRoles.php?id='+row.data().eid,
            success: function(data) {
                 $roleData = JSON.parse(data)
                 $table = '<table class = "innerTable" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                    '<tr>'+
                        '<fieldset> ' +
                            '<legend>Employee roles </legend>'+
                            '<form action="employeemap"> ' ;

                             for (i = 0 ; i<$roleData.data.length ;i++) {
                                $table = $table + '<input type="checkbox" name="role" value= "'+ 
                                        $roleData.data[i].rolename+'"';
                                if($roleData.data[i].hasrole == 1)  
                                {
                                     $table = $table + 'checked'
                                }
                                $table = $table  + ' > '+ $roleData.data[i].rolename+' <br> '  ; 
                            }
                            $table = $table+ '<input type="submit" value="Submit"> ' +
                        '</form>' +
                        '</fieldset> ' +
                    '</tr>'+
                '</table>'; 
            console.log($table);
             row.child($table).show();
             tr.addClass('shown');
                   
            }});
      //      row.child( format(row.data()) ).show();
           
        }

    } );



} ); 