console.log('register_Probation_unit.js loading');
$(document).ready(function() {
    $('.input-animate').keyup(function(e) {
        var value = $(this).val();
        $(this).attr('value', value);
    })
});

$('#btnSave').on('click', function () {
    var form = $('#probation_unit_form').get(0);
    var data = new FormData(form);
    save(data);
});

function save(data){
    $.ajax({
        type: "POST",
        url: "/register_Probation_unit/save",
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
                toastr.success('Probation Center Created');
                reset();
            }
            else{
                toastr.error('Something went wrong');

            }

        },
        error: function (error) {
            console.log(error);

            if (error.status == 422) { // when status code is 422, it's a validation issue
                console.log(error.responseJSON);
                // you can loop through the errors object and show it to the user
                console.warn(error.responseJSON.errors);
                // display errors on each form field
                $.each(error.responseJSON.errors, function (i, error) {
                    var el = $(document).find('[name="'+i+'"]');
                    el.after($('<span style="color: red;">'+error[0]+'</span>'));
                    toastr.warning(error[0]);
                    console.clear()

                });
            }
            else{
                toastr.error('Something went wrong');
            }
        },
        complete: function () {

        }

    });
}

function reset(){
    $('#name').val('');
    $('#address').val('');
    $('#district').val('');
    $('#divitional_secretariat').val('');
    $('#senior_officer').val('');
    $('#officer_incharge').val('');
    $('#number_of_offices').val('');
    $('#tp_no').val('');
    $('#fax').val('');
    $('#email').val('');
    $('#remarks').val('');


}


