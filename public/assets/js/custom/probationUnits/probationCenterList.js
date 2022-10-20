console.log('probationCenterList.js');

$(document).ready(function () {

    $('#tblProbationCenters').DataTable({
        responsive: true,
        'columnDefs': [{
            "targets": [0, 1, 2, 3, 4],
            "className": "text-center",
        }],
        "order": [],
        "columns": [
            { "data": "thId" },
            { "data": "thName" },
            { "data": "thTpNo" },
            { "data": "thNumOfStalf" },
            { "data": "thNumOfChildren" },
            { "data": "actions" },
        ],
    });

    loadProbationCenters();
    $('#btnexpt').on('click', function () {
        ExportExcel('xlsx');
    });
});

function ExportExcel(type, fn, dl) {
    var elt = document.getElementById('tblProbationCenters');
    var wb = XLSX.utils.table_to_book(elt, {sheet:"Sheet JS"});
    return dl ?
       XLSX.write(wb, {bookType:type, bookSST:true, type: 'base64'}) :
       XLSX.writeFile(wb, fn || ('Children.' + (type || 'xlsx')));
}
function loadProbationCenters() {
    $.ajax({
        type: 'GET',
        url: '/probationCenterList/loadProbationCenters',
        success: function (response) {
            console.log(response.result)
            if (response.success) {

                var data = [];
                for (i = 0; i < response.result.length; i++) {
                    var id = response.result[i]['probation_center_id'];
                    var name = response.result[i]['name'];
                    var tp_no = response.result[i]['tp_no'];
                    var edit = '<button class="btn btn-primary mr-1" onclick="edit(' + id + ')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
                    // var dele ='<button class="btn btn-danger mr-1" onclick="_delete(' + id + ')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                    var view = '<button class="btn btn-success mr-1" onclick="view(' + id + ')"><i class="fa fa-eye" aria-hidden="true"></i></button>';


                        data.push({
                            "thId": id,
                            "thName": name,
                            "thTpNo": tp_no,
                            "thNumOfStalf": '',
                            "thNumOfChildren": '',
                            "actions":view+edit,
                        });

                }

                var table = $('#tblProbationCenters').DataTable();
                table.clear();
                table.rows.add(data).draw();
            }
        }, error: function (data) {
            console.log('something went wrong');
        }
    });
}




// function _delete(id) {
//     $.ajax({
//         type: 'DELETE',
//         headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
//         url: '/am/purchasenewassestlist/delete/' + id,
//         success: function (response) {
//             console.log(response);

//             if (response.success) {
//                 toastr.error('Request Deleted');
//                 loadrequests();
//             }
//         }, error: function (data) {
//             console.log('something went wrong');
//         }
//     });
// }

function view(id) {
    location.href = "/createProbationCenter?" + id + "&view";
}
function edit(id) {

    location.href = "/createProbationCenter?" + id;

}

