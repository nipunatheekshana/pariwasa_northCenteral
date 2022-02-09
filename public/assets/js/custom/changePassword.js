console.log('changepassword.js');

function showChangePasswordModel(){
    $('#changePasswordModel').modal('toggle');
}

function changePassword(){
    var form = $('#changePasswordForm').get(0);
    var data = new FormData(form);

    $.ajax({
        type: "POST",
        url: "/changepassword/changePassword",
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
            if(response){
                toastr.success('Password Changed');
                $('#changePasswordModel').modal('toggle');
            }
            else{
                toastr.error('Wrong Password');

            }

            $('#changePasswordForm')[0].reset();
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
                    // console.clear()

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
