console.log('children_list.js loading');
$(document).ready(function() {
    $('#Childrentable').DataTable({
        responsive: true,
        'columnDefs': [{
                "targets":  [0,1,2,3,4,5,6,7] , 
                "className": "text-center",
           }],
        "order": [],
        "columns": [
          { "data": "thchildId" },
          { "data": "thname" },
          { "data": "thGender" },
          { "data": "thDate_entered" },
          { "data": "parent" },
          { "data": "edit" },
          { "data": "view" },
          { "data": "delete" },

        ],
    });
    loadChildren();
});

function loadChildren(){
    $.ajax({
        type: 'GET',
        url: '/children_list/loadChildren',
        success: function(response){
            console.log(response.data.result)
            if (response.data.success) {

                var data = [];
                for (i = 0; i < response.data.result.length; i++) {
                    var child_id  = response.data.result[i]['child_id'];
                    var name  = response.data.result[i]['full_name'];
                    var gender  = response.data.result[i]['gender'];
                    var Date_entered  = response.data.result[i]['date_entered'];

                    data.push({
                        "thchildId": child_id,
                        "thname":name,
                        "thGender":gender,
                        "thDate_entered":Date_entered,
                        "parent": '<button class="btn btn-warning" onclick="parentDetails(' + child_id + ')"><i class="fas fa-user-circle" aria-hidden="true"></i></button>',
                        "edit": '<button class="btn btn-primary" onclick="edit(' + child_id + ')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>',
                        "view": '<button class="btn btn-success" onclick="edit(' + child_id + ')"><i class="fas fa-eye" aria-hidden="true"></i></button>',
                        "delete": '<button class="btn btn-danger" onclick="_delete(' + child_id + ')"><i class="fa fa-trash" aria-hidden="true"></i></button>'
                     });
                }

                var table = $('#Childrentable').DataTable();
                table.clear();
                table.rows.add(data).draw();
            }
        }, error: function(data){
            console.log('something went wrong');
        }
    });
}
function parentDetails(id){

    $('#myModal').toggle();
}



