console.log('createProbationCenter.js loading');
$(document).ready(function() {



    $('#btnSave').on('click', function () {
        var form = $('#probation_center_form').get(0);
        var data = new FormData(form);

        if($('#btnSave').text().trim()=='Save'){
            save(data);
        }
        else{
            update(data);
        }

    });
    loadProbationCenter() ;
    loadcatagories();
});

function loadcatagories(){
    $.ajax({
        type: 'GET',
        url: '/createProbationCenter/loadcatagories',
        success: function(response){
            console.log(response.result)
            if (response.success) {
                var html = "";
                $.each(response.result, function(index, value){

                    html += '<option value="'+value.id+'" > '+value.category+' </option>';
                });
                $('#catagory').html(html);


            }
        }, error: function(data){
            console.log(data);
            console.log('something went wrong');
        }
    });
}

function save(data){
    $.ajax({
        type: "POST",
        url: "/createProbationCenter/save",
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

function update(data){
    $.ajax({
        type: "POST",
        url: "/createProbationCenter/update",
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
                toastr.success('Probation Center Updated');
                reset();
                location.href='/probationCenterList'
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

function loadProbationCenter() {

    if (window.location.search.length > 0) {
        var sPageURL = window.location.search.substring(1);
        var param = sPageURL.split('&');
        var id = param[0];
       if (param.length == 2) {
            console.log('view ')
            $('#btnSave').hide();

        } else {
            console.log('edit ');
            $('#btnSave').text('Update');

        }

    }
    if (id){
        $.ajax({
            type: "GET",
            url: "/createProbationCenter/loadProbationCenter/" + id,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 800000,
            beforeSend: function () {

            },
            success: function (response) {

                console.log(response)
                if (response.success) {

                    console.log(response.result);
                    var data = response.result;
                    $('#name').val(data.name);
                    $('#date_started').val(data.date_started);
                    $('#catagory').val(data.catagory);
                    $('#district').val(data.district);
                    $('#divitional_secretariat').val(data.divitional_secretariat);
                    $('#tp_no').val(data.tp_no);
                    $('#registration_no').val(data.registration_no);
                    $('#registration_date').val(data.registration_date);
                    $('#fund').val(data.fund);
                    $('#gramaseva_divition').val(data.gramaseva_divition);
                    $('#maximum_children_capacity').val(data.maximum_children_capacity);
                    $('#minimum_children_capacity').val(data.minimum_children_capacity);
                    $('#address').val(data.address);
                    $('#txtid').val(data.probation_center_id);

                }

            },
            error: function (error) {
                console.log(error);

            },
            complete: function () {

            }

        });
    }

}
function reset(){
    $('#name').val('');
    $('#date_started').val('');
    $('#catagory').val('');
    $('#district').val('');
    $('#divitional_secretariat').val('');
    $('#tp_no').val('');
    $('#registration_no').val('');
    $('#registration_date').val('');
    $('#fund').val('');
    $('#gramaseva_divition').val('');
    $('#maximum_children_capacity').val('');
    $('#minimum_children_capacity').val('');
    $('#address').val('');





}


