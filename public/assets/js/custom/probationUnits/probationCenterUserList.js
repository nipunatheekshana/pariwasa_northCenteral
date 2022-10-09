console.log('probationCenterUserList.js');

$(document).ready(function () {

    $('#tblProbationUnitsUser').DataTable({
        responsive: true,
        'columnDefs': [{
            "targets": [0, 1, 2, 3,4],
            "className": "text-center",
        }],
        "order": [],
        "columns": [
            { "data": "thId" },
            { "data": "thCenterName" },
            { "data": "thName" },
            { "data": "thEmail" },
            { "data": "actions" },
        ],
    });

    loadProbationCenterUsers();

});


function loadProbationCenterUsers() {
    $.ajax({
        type: 'GET',
        url: '/probationCenterUserList/loadProbationCenterUsers',
        success: function (response) {
            console.log(response.result)
            if (response.success) {

                var data = [];
                for (i = 0; i < response.result.length; i++) {
                    var id = response.result[i]['id'];
                    var name = response.result[i]['name'];
                    var email = response.result[i]['email'];
                    var probationCenterName=response.result[i]['Cname'];
                    var edit = '<button class="btn btn-primary mr-1" onclick="edit(' + id + ')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
                    var dele ='<button class="btn btn-danger mr-1" onclick="_delete(' + id +')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                    var view = '<button class="btn btn-success mr-1" onclick="view(' + id + ')"><i class="fa fa-eye" aria-hidden="true"></i></button>';


                        data.push({
                            "thId": id,
                            "thCenterName": probationCenterName,
                            "thName": name,
                            "thEmail": email,
                            "actions":view,
                        });

                }

                var table = $('#tblProbationUnitsUser').DataTable();
                table.clear();
                table.rows.add(data).draw();
            }
        }, error: function (data) {
            console.log('something went wrong');
        }
    });
}




function _delete(id) {

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover  !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
        if (willDelete) {
            swal( "User has been deleted!", {icon: "success",});

            $.ajax({
                type: 'DELETE',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: '/probationCenterUserList/deleteProbationCenterUsers/' + id,
                success: function (response) {
                    console.log(response);

                    if (response.success) {
                        toastr.error('User Deleted');
                        loadProbationCenterUsers();
                    }
                }, error: function (data) {
                    console.log('something went wrong');
                }
            });
        } else {
            swal("Aborted!", { icon: "error",});
        }

    });


}

function view(id) {
    location.href = "/createProbationCenterUsers?" + id + "&view";
}
function edit(id) {

    location.href = "/createProbationCenterUsers?" + id;

}

