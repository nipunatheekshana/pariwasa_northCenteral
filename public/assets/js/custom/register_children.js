console.log('register_children.js loading');


$(document).ready(function() {
    $('.input-animate').keyup(function(e) {
        var value = $(this).val();
        $(this).attr('value', value);
    })
});

$('#btnSave').on('click', function () {
    var form = $('#register_children_form').get(0);
    var data = new FormData(form);
    save(data);
});

function save(data){
    $.ajax({
        type: "POST",
        url: "/register_children/save",
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


}


