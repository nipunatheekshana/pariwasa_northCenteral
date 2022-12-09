console.log('probationUnitEmployeeList.js');

$(document).ready(function () {

    $('#tblProbationunitEmployee').DataTable({
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
            "targets": [0, 1, 2, 3, 4],
            "className": "text-center",
        }],
        "order": [],
        "columns": [
            { "data": "thId" },
            { "data": "thName" },
            { "data": "thTpNo" },
            { "data": "thdesig" },
            { "data": "actions" },
        ],
    });

    loadProbationUnitEmployees();
    $('#btnexpt').on('click', function () {
        ExportExcel('xlsx');
    });
});

function ExportExcel(type, fn, dl) {
    var elt = document.getElementById('tblProbationunitEmployee');
    var wb = XLSX.utils.table_to_book(elt, {sheet:"Sheet JS"});
    return dl ?
       XLSX.write(wb, {bookType:type, bookSST:true, type: 'base64'}) :
       XLSX.writeFile(wb, fn || ('Children.' + (type || 'xlsx')));
}
function loadProbationUnitEmployees() {
    $.ajax({
        type: 'GET',
        url: '/probationUnitEmployeeList/loadProbationUnitEmployees',
        success: function (response) {
            console.log(response.result)
            if (response.success) {

                var data = [];
                for (i = 0; i < response.result.length; i++) {
                    var id = response.result[i]['employee_id'];
                    var name = response.result[i]['full_name'];
                    var tp_no = response.result[i]['tp_no'];
                    var desigName = response.result[i]['desigName'];

                    var edit = '<button class="btn btn-primary mr-1" onclick="edit(' + id + ')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
                    var dele ='<button class="btn btn-danger mr-1" onclick="_delete(' + id + ')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                    var view = '<button class="btn btn-success mr-1" onclick="view(' + id + ')"><i class="fa fa-eye" aria-hidden="true"></i></button>';


                        data.push({
                            "thId": id,
                            "thName": name,
                            "thTpNo": tp_no,
                            "thdesig": desigName,
                            "actions":view+edit,
                        });

                }

                var table = $('#tblProbationunitEmployee').DataTable();
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
        url: '/probationUnitEmployeeList/delete/' + id,
        success: function (response) {
            console.log(response);

            if (response.success) {
                toastr.error('Request Deleted');
                loadProbationUnitEmployees();
            }
        }, error: function (data) {
            console.log('something went wrong');
        }
    });
}

function view(id) {
    location.href = "/registerProbationUnitEmployee?" + id + "&view";
}
function edit(id) {

    location.href = "/registerProbationUnitEmployee?" + id;

}

