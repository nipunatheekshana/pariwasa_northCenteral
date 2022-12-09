console.log('probationUnitUserList.js');

$(document).ready(function () {

    $('#tblProbationUnitsUser').DataTable({
        scrollY: 600,
        scrollX: true,
        scrollCollapse: true,
        'columnDefs': [
            {
                "targets": '_all',
                "createdCell": function (td) {
                    $(td).css('padding', '2px')
                }
            },{
            "targets": [0, 1, 2, 3,4],
            "className": "text-center",
        }],
        "order": [],
        "columns": [
            { "data": "thId" },
            { "data": "thUnitName" },
            { "data": "thName" },
            { "data": "thEmail" },
            { "data": "actions" },
        ],
    });

    loadProbationUnitUsers();

});


function loadProbationUnitUsers() {
    $.ajax({
        type: 'GET',
        url: '/probationUnitUserList/loadProbationUnitUsers',
        success: function (response) {
            console.log(response.result)
            if (response.success) {

                var data = [];
                for (i = 0; i < response.result.length; i++) {
                    var id = response.result[i]['id'];
                    var name = response.result[i]['name'];
                    var email = response.result[i]['email'];
                    var probationunitName=response.result[i]['pname'];
                    var edit = '<button class="btn btn-primary mr-1" onclick="edit(' + id + ')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
                    var dele ='<button class="btn btn-danger mr-1" onclick="_delete(' + id +')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                    var view = '<button class="btn btn-success mr-1" onclick="view(' + id + ')"><i class="fa fa-eye" aria-hidden="true"></i></button>';


                        data.push({
                            "thId": id,
                            "thUnitName": probationunitName,
                            "thName": name,
                            "thEmail": email,
                            "actions":view+dele,
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
                url: '/probationUnitUserList/deleteProbationUnitUsers/' + id,
                success: function (response) {
                    console.log(response);

                    if (response.success) {
                        toastr.error('User Deleted');
                        loadProbationUnitUsers();
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
    location.href = "/createProbationUnitUser?" + id + "&view";
}
function edit(id) {

    location.href = "/createProbationUnitUser?" + id;

}

