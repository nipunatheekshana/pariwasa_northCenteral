console.log('filterProbationCenters.js')

$(document).ready(function () {

    $('select').attr('disabled', true);

    $('#tblProbationCenters').DataTable({
        scrollY: 600,
        scrollX: true,
        scrollCollapse: true,
        'columnDefs': [ {
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
            { "data": "thNumOfStalf" },
            { "data": "thNumOfChildren" },
            { "data": "actions" },
        ],
    });




    $('#cbxpbCenter').change(function () {

        if (this.checked) {
            $('#pbCenter').attr('disabled', false);
        } else {
            $('#pbCenter').attr('disabled', true);
        }

    });
    $('#cbxpbOffice').change(function () {

        if (this.checked) {
            $('#pbOffice').attr('disabled', false);
        } else {
            $('#pbOffice').attr('disabled', true);
        }

    });
    $('#cbxGender').change(function () {

        if (this.checked) {
            $('#gender').attr('disabled', false);
        } else {
            $('#gender').attr('disabled', true);
        }

    });



    $('#pbOffice').change(function () {

        $.ajax({
            type: 'GET',
            url: '/adminFilterChildren/loadPbCenterToUnit/' + this.value,
            async: false,
            success: function (response) {
                if (response.success) {
                    console.log(response);
                    var html = "";
                    $.each(response.result, function (index, value) {

                        html += '<option value="' + value.probation_center_id + '" > ' + value.name + ' </option>';
                    });
                    $('#pbCenter').html(html);
                }
            }, error: function (data) {
                console.log('something went wrong');
            }
        });

    });

    $('#btnReload').on('click', function () {

        var conditions =SetConditions();

        $.ajax({
            type: 'GET',
            url: '/adminFilterChildren/loadData',
            data: conditions,
            async: false,
            success: function(response){
                console.log(response)

                if (response.success) {
                    console.log(response.result)
                    var data = [];
                    for (i = 0; i < response.result.length; i++) {
                        var id = response.result[i]['id'];
                        var name = response.result[i]['full_name'];
                        var gender= response.result[i]['gender'];
                        var nationality= response.result[i]['nationality'];
                        var religion= response.result[i]['religion'];
                        var helth_status= response.result[i]['helth_status'];
                        var how_entered= response.result[i]['how_entered'];
                        var case_number= response.result[i]['case_number'];
                        var Entered_divition= response.result[i]['Entered_divition'];
                        var court= response.result[i]['court'];
                        var crime_commited= response.result[i]['crime_commited'];
                        var date_entered= response.result[i]['date_entered'];
                        var status_before_enter= response.result[i]['status_before_enter'];
                        var status_after_enter= response.result[i]['status_after_enter'];
                        var disability= response.result[i]['disability'];
                        var divitional_secretariat= response.result[i]['DistrictName'];
                        var policeDivition= response.result[i]['policename'];
                        var gramaseva_divition= response.result[i]['gramasewaname'];
                        var address= response.result[i]['address'];
                        var transfer_address= response.result[i]['transfer_address'];
                        var birth_certificate= response.result[i]['birth_certificate'];

                        var DOB = response.result[i]['DOB'];

                        var edit = '<button class="btn btn-primary mr-1" onclick="edit(' + id + ')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
                        var dele ='<button class="btn btn-danger mr-1" onclick="_delete(' + id + ')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
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

                                "actions":view+edit+dele,
                            });


                    }

                    var table = $('#tblChildren').DataTable();
                    table.clear();
                    table.rows.add(data).draw();
                }
            }, error: function(data){
                console.log('something went wrong');
            }
        });
    });

    $('#btnexpt').on('click', function () {
        ExportExcel('xlsx');
    });

    // loadPbCenter();
    // loadChildren();
    // loadPbOffice();
    loadProbationCenters();

});

function ExportExcel(type, fn, dl) {
    var elt = document.getElementById('tblChildren');
    var wb = XLSX.utils.table_to_book(elt, {sheet:"Sheet JS"});
    return dl ?
       XLSX.write(wb, {bookType:type, bookSST:true, type: 'base64'}) :
       XLSX.writeFile(wb, fn || ('Children.' + (type || 'xlsx')));
}

function SetConditions() {
    var conditions = {
        "probation_center_id": null,
        "Probation_unit_id": null,
        "gender": null,


    };


    if ($('#cbxpbCenter').is(":checked")) {
        conditions.probation_center_id = $('#pbCenter').val();
    }
    if ($('#cbxpbOffice').is(":checked")) {
        conditions.Probation_unit_id = $('#pbOffice').val();
    }
    if ($('#cbxGender').is(":checked")) {
        conditions.gender = $('#gender').val();
    }



    return conditions;
}
function loadPbCenter() {
    $.ajax({
        type: 'GET',
        url: '/adminFilterChildren/loadPbCenter',
        async: false,
        success: function (response) {
            if (response.success) {
                console.log(response);
                var html = "";
                $.each(response.result, function (index, value) {

                    html += '<option value="' + value.probation_center_id + '" > ' + value.name + ' </option>';
                });
                $('#pbCenter').html(html);
            }
        }, error: function (data) {
            console.log('something went wrong');
        }
    });
}
function loadPbOffice() {
    $.ajax({
        type: 'GET',
        url: '/adminFilterChildren/loadPbOffice',
        async: false,
        success: function (response) {
            if (response.success) {
                console.log(response.result);
                var html = "";
                $.each(response.result, function (index, value) {

                    html += '<option value="' + value.Probation_unit_id + '" > ' + value.name + ' </option>';
                });
                $('#pbOffice').html(html);
            }
        }, error: function (data) {
            console.log('something went wrong');
        }
    });
}
function loadProbationCenters() {
    $.ajax({
        type: 'GET',
        url: '/adminFilterProbationCenters/loadProbationCenters',
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
            console.log(data)
            console.log('something went wrong');
        }
    });
}

