console.log('filterChildren.js')

$(document).ready(function () {

    $('select').attr('disabled', true);

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
                        var DOB = response.result[i]['DOB'];

                        var edit = '<button class="btn btn-primary mr-1" onclick="edit(' + id + ')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
                        var dele ='<button class="btn btn-danger mr-1" onclick="_delete(' + id + ')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                        var view = '<button class="btn btn-success mr-1" onclick="view(' + id + ')"><i class="fa fa-eye" aria-hidden="true"></i></button>';


                            data.push({
                                "thId": id,
                                "thName": name,
                                "thGender": gender,
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


    loadPbCenter();
    loadChildren();
    loadPbOffice();

});

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


function loadChildren() {
    $.ajax({
        type: 'GET',
        url: '/adminFilterChildren/loadChildren',
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
                            "actions":view+edit+dele,
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

