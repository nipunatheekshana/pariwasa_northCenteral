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



    $('#cbxpboffice').change(function () {

        if (this.checked) {
            $('#pboffice').attr('disabled', false);
        } else {
            $('#pboffice').attr('disabled', true);
        }

    });



    $('#cmbSite').change(function () {

        $.ajax({
            type: 'GET',
            url: '/am/assetListReport/loadBuilding/' + this.value,
            async: false,
            success: function (response) {
                if (response.success) {
                    console.log(response);
                    var html = "";
                    $.each(response.result, function (index, value) {

                        html += '<option value="' + value.id + '" > ' + value.Building + ' </option>';
                    });
                    $('#cmbBuilding').html(html);
                }
            }, error: function (data) {
                console.log('something went wrong');
            }
        });

    });

    $('#btnPrint').on('click', function () {

        var conditions =SetConditions();

        $.ajax({
            type: 'GET',
            url: '/am/assetListReport/loadData/',
            data: conditions,
            async: false,
            success: function(response){
                if (response.success) {
                    console.log(response)
                    makePage(response,'PRINT');

                }
            }, error: function(data){
                console.log('something went wrong');
            }
        });
    });


    // loadSites();
    loadChildren();

});

function SetConditions() {
    var conditions = {
        "site": null,
    };


    if ($('#cbxSite').is(":checked")) {
        conditions.site = $('#cmbSite').val();
    }
    


    return conditions;
}
 




function loadSites() {
    $.ajax({
        type: 'GET',
        url: '/am/assetListReport/loadSites',
        async: false,
        success: function (response) {
            if (response.success) {
                console.log(response);
                var html = "";
                $.each(response.result, function (index, value) {

                    html += '<option value="' + value.id + '" > ' + value.Site + ' </option>';
                });
                $('#cmbSite').html(html);
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

