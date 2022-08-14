console.log('probationUnitList.js');

$(document).ready(function () {

    $('#tblProbationUnits').DataTable({
        responsive: true,
        'columnDefs': [{
            "targets": [0, 1, 2, 3, 4, 5, 6],
            "className": "text-center",
        }],
        "order": [],
        "columns": [
            { "data": "thId" },
            { "data": "thName" },
            { "data": "thTpNo" },
            { "data": "thEmail" },
            { "data": "thNumOfOfficers" },
            { "data": "thNumofCenters" },
            { "data": "actions" },
        ],
    });

    loadProbationUnits();

});


function loadProbationUnits() {
    $.ajax({
        type: 'GET',
        url: '/probationUnitList/loadProbationUnits',
        success: function (response) {
            console.log(response.result)
            if (response.success) {

                var data = [];
                for (i = 0; i < response.result.length; i++) {
                    var id = response.result[i]['Probation_unit_id'];
                    var name = response.result[i]['name'];
                    var tp_no = response.result[i]['tp_no'];
                    var email = response.result[i]['email'];
                    var edit = '<button class="btn btn-primary mr-1" onclick="edit(' + id + ')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
                    var dele = '<button class="btn btn-danger mr-1" onclick="_delete(' + id + ')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                    var view = '<button class="btn btn-success mr-1" onclick="view(' + id + ')"><i class="fa fa-eye" aria-hidden="true"></i></button>';


                    data.push({
                        "thId": id,
                        "thName": name,
                        "thTpNo": tp_no,
                        "thEmail": email,
                        "thNumOfOfficers": '',
                        "thNumofCenters": '',
                        "actions": view + edit + dele,
                    });

                }

                var table = $('#tblProbationUnits').DataTable();
                table.clear();
                table.rows.add(data).draw();
            }
        }, error: function (data) {
            console.log('something went wrong');
        }
    });
}




function _delete(id) {
    if (confirm("Are you sure") == true) {
        $.ajax({
            type: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: '/probationUnitList/delete/' + id,
            success: function (response) {
                console.log(response);

                if (response.success) {
                    toastr.error('Request Deleted');
                    loadProbationUnits();
                }
            }, error: function (data) {
                console.log('something went wrong');
            }
        });
    } else {
    }

}

function view(id) {
    location.href = "/createProbationUnit?" + id + "&view";
}
function edit(id) {

    location.href = "/createProbationUnit?" + id;

}

