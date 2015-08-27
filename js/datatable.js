
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
                 $.ajax({
                type: 'get',
                url: './php/lookupEmployeeRoles.php?id='+row.data().eid,
                success: function(data) {
                     var roleData = JSON.parse(data);
                     var table = '<div id="innerTable" class="form-group">'
                                    +'<fieldset>'
                                        +'<legend>Employee roles </legend>'
                                        + '{{for data}}'
                                        + '<input type="checkbox" name="role" value= "{{:roleid}}" '
                                        + '{{if hasrole == "1"}} checked {{else}} notChecked {{/if}}'
                                        + ' > {{:rolename}} <br/>'
                                        + '{{/for}}'
                                        + '<button id="empButton" class="btn btn-default" type="submit">Submit form</button>' 
                                    +'</fieldset>'
                                +'</div>'; 

                var tableTemplate = $.templates(table);
                var htmlOutput = tableTemplate.render(roleData);
                console.log(htmlOutput)
                row.child(htmlOutput).show();
                tr.addClass('shown');

                }});           
            }

        } );

    $.fn.dataTable.ext.errMode = function ( settings, helpPage, message ) { 
        alert(JSON.parse(settings.jqXHR.responseText).result);
    };

    $('#employee tbody').on('click', 'button', function () {
        var thisTr = $(this).closest('tr');
        var trData = empTable.row(thisTr.prev()).data();

        jsonObj = [];
        for( i =0 ;i<thisTr.find('input').length;i++){
            var checked = thisTr.find('input')[i].checked;
            var id = thisTr.find('input')[i].value;
            item = {};
            item ["roleid"] = id;
            item ["assigned"] = checked;
            item ["employeeid"] = trData.eid
            jsonObj.push(item);
        }  

        var jsonPayload = {};
        jsonPayload['data'] = jsonObj;

        //Ajax post data to server
        var dataPost = $.post('./php/update_roles.php', jsonPayload, function(response){
            alert( "Update was successful" );
        }, 'json')
        .fail(function() {
          alert("Update was failure" );
        });

    });
} ); 