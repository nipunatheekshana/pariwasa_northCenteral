console.log('register_probation_unit_employees.js loading');

$(document).ready(function() {
    $('.input-animate').keyup(function(e) {
        var value = $(this).val();
        $(this).attr('value', value);
    })
});

$('#btnSave').on('click', function () {
    var form = $('#probation_unit_employee_form').get(0);
    var data = new FormData(form);
    save(data);
});

function save(data){
    $.ajax({
        type: "POST",
        url: "/register_probation_unit_employees/save",
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
    $('#full_name').val('');
    $('#address').val('');
    $('#designation').val('');
    $('#grade').val('');
    $('#tp_no').val('');
    $('#selectgender').val('');
    $('#NIC_no').val('');
    $('#date_of_employeement_at_probational_unit').val('');
    $('#working_divitional_secretariat').val('');
    $('#working_police_divition').val('');
    $('#working_equipment').val('');
    $('#DOB').val('');
    $('#email').val('');
    $('#date_of_employeement').val('');
    $('#pension_no').val('');
    $('#basic_salary').val('');
    $('#Incriment_date').val('');
    $('#incriment_value').val('');
    $('#Education_qualifications').val('');
    $('#other_qualification').val('');
    $('#courses_falloed_by_the_institute').val('');
    $('#courses_hope_to_fallow').val('');

}


