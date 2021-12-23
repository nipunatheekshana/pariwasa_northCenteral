console.log('register_probation_center.js loading');


$(document).ready(function () {
    loadProbation_unit();
});

function loadProbation_unit(){
    $.ajax({
        type: "GET",
        url: "/register_Probation_center/loadProbation_unit",

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        cache: false,
        timeout: 800000,
        success: function (response) {
            console.log(response.data.result);

            if(response.data.success){
                var html = "";
                $.each(response.data.result, function(index, value){

                    html += '<option value="'+value.Probation_unit_id+'" > '+value.name+' </option>';
                });
                $('#selectProbationalUnit').html(html);
            }
        },
        error: function (error) {
            console.log('comething went wrong');
        },
    });
}

$('#btnSave').on('click', function () {
    var form = $('#probation_center_form').get(0);
    var data = new FormData(form);
    save(data);
});


function save(data){
    $.ajax({
        type: "POST",
        url: "/register_Probation_center/save",
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        cache: false,
        timeout: 800000,
        beforeSend: function () {

        },
        success: function (response) {
            console.log(response);
            if(response.data.success){
                message('success',response.data.result,'fas fa-check');
                reset();
            }
            else{
                message('danger',response.data.result,'fas fa-times');

            }

        },
        error: function (error) {
            console.log(error);

            message('danger','Something is wrong','fas fa-times');
        },
        complete: function () {

        }

    });
}

function reset(){
    $('#name').val('');
    $('#date_started').val('');
    $('#catagory').val('');
    $('#district').val('');
    $('#divitional_secretariat').val('');
    $('#address').val('');
    $('#tp_no').val('');
    $('#registration_no').val('');
    $('#registration_date').val('');
    $('#fund').val('');
    $('#number_Of_stalf').val('');
    $('#gramaseva_divition').val('');
    $('#maximum_children_capacity').val('');
    $('#minimum_children_capacity').val('');
}


