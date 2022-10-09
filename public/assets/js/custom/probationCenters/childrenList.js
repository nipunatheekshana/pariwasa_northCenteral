console.log('childrenList.js');

$(document).ready(function () {

    $('#tblChildren').DataTable({
        responsive: true,
        'columnDefs': [{
            "targets": [0, 1, 2, 3, 4],
            "className": "text-center",
        }],
        "order": [],
        "columns": [
            { "data": "thId" },
            { "data": "thName" },
            { "data": "thGender" },
            { "data": "thDOB" },
            { "data": "actions" },
        ],
    });

    loadChildren();

});


function loadChildren() {
    $.ajax({
        type: 'GET',
        url: '/childrenList/loadChildren',
        success: function (response) {
            console.log(response.result)
            if (response.success) {

                var data = [];
                for (i = 0; i < response.result.length; i++) {
                    var id = response.result[i]['id'];
                    var name = response.result[i]['full_name'];
                    var gender= response.result[i]['gender'];
                    var DOB = response.result[i]['DOB'];

                    var edit = '<button class="btn btn-primary mr-1" onclick="edit(' + id + ')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
                    var dele ='<button class="btn btn-danger mr-1" onclick="_delete(' + id + ')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                    var view = '<button class="btn btn-success mr-1" onclick="view(' + id + ')"><i class="fa fa-eye" aria-hidden="true"></i></button>';


                        data.push({
                            "thId": id,
                            "thName": name,
                            "thGender": gender,
                            "thDOB": DOB,
                            "actions":view+edit,
                        });

                }

                var table = $('#tblChildren').DataTable();
                table.clear();
                table.rows.add(data).draw();
            }
        }, error: function (data) {
            console.log('something went wrong');
        }
    });
}




function _delete(id) {
    $.ajax({
        type: 'DELETE',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: '/childrenList/delete/' + id,
        success: function (response) {
            console.log(response);

            if (response.success) {
                toastr.error('Child Deleted');
                loadChildren();
            }
        }, error: function (data) {
            console.log('something went wrong');
        }
    });
}

function view(id) {
    location.href = "/registerChildren?" + id + "&view";
}
function edit(id) {

    location.href = "/registerChildren?" + id;

}

