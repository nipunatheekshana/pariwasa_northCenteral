console.log('childrenList.js');

$(document).ready(function () {

    $('#tblChildren').DataTable({
        scrollY: 600,
        scrollX: true,
        info: false,
        scrollCollapse: true,
        "paging": false,
        // 'columnDefs': [{
        //     "targets": [0, 1, 2, 3, 4],
        //     "className": "text-center",
        // }],
        "order": [],
        "columns": [
            { "data": "thId" },
            { "data": "thName" },
            { "data": "thGender" },
            { "data": "thnationality" },
            { "data": "threligion" },
            { "data": "thhelth_status" },
            { "data": "thhow_entered" },
            { "data": "thcase_number" },
            { "data": "thEntered_divition" },
            { "data": "thcrime_commited" },
            { "data": "thdate_entered" },
            { "data": "thstatus_before_enter" },
            { "data": "thstatus_after_enter" },
            { "data": "thdivitional_secretariat" },
            { "data": "thpoliceDivition" },
            { "data": "thgramaseva_divition" },
            { "data": "thaddress" },
            { "data": "thtransfer_address" },
            { "data": "thcourt" },
            { "data": "thdisability" },
            { "data": "thbirth_certificate" },
            { "data": "thDOB" },
            { "data": "actions" },
        ],
    });
    $('#btnexpt').on('click', function () {
        ExportExcel('xlsx');
    });

    loadChildren();

});
function ExportExcel(type, fn, dl) {
    var elt = document.getElementById('tblChildren');
    var wb = XLSX.utils.table_to_book(elt, { sheet: "Sheet JS" });
    return dl ?
        XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
        XLSX.writeFile(wb, fn || ('Children.' + (type || 'xlsx')));
}

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
                    var gender = response.result[i]['gender'];
                    var nationality = response.result[i]['nationality'];
                    var religion = response.result[i]['religion'];
                    var helth_status = response.result[i]['helth_status'];
                    var how_entered = response.result[i]['how_entered'];
                    var case_number = response.result[i]['case_number'];
                    var Entered_divition = response.result[i]['Entered_divition'];
                    var court = response.result[i]['court'];
                    var crime_commited = response.result[i]['crime_commited'];
                    var date_entered = response.result[i]['date_entered'];
                    var status_before_enter = response.result[i]['status_before_enter'];
                    var status_after_enter = response.result[i]['status_after_enter'];
                    var disability = response.result[i]['disability'];
                    var divitional_secretariat = response.result[i]['DistrictName'];
                    var policeDivition = response.result[i]['policename'];
                    var gramaseva_divition = response.result[i]['gramasewaname'];
                    var address = response.result[i]['address'];
                    var transfer_address = response.result[i]['transfer_address'];
                    var birth_certificate = response.result[i]['birth_certificate'];

                    var DOB = response.result[i]['DOB'];

                    var edit = '<button class="btn btn-primary mr-1" onclick="edit(' + id + ')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
                    var dele = '<button class="btn btn-danger mr-1" onclick="_delete(' + id + ')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                    var view = '<button class="btn btn-success mr-1" onclick="view(' + id + ')"><i class="fa fa-eye" aria-hidden="true"></i></button>';


                    data.push({
                        "thId": id,
                        "thName": name,
                        "thGender": gender,
                        "thnationality": nationality,
                        "threligion": religion,
                        "thhelth_status": helth_status,
                        "thhow_entered": how_entered,
                        "thcase_number": case_number,
                        "thEntered_divition": Entered_divition,
                        "thcrime_commited": crime_commited,
                        "thdate_entered": date_entered,
                        "thstatus_before_enter": status_before_enter,
                        "thstatus_after_enter": status_after_enter,
                        "thdivitional_secretariat": divitional_secretariat,
                        "thpoliceDivition": policeDivition,
                        "thgramaseva_divition": gramaseva_divition,
                        "thaddress": address,
                        "thtransfer_address": transfer_address,
                        "thcourt": court,
                        "thdisability": disability,
                        "thbirth_certificate": birth_certificate,
                        "thDOB": DOB,

                        "actions": view + edit ,
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

