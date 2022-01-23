console.log('register_Probation_unit.js loading');
$(document).ready(function() {



    $('#btnSave').on('click', function () {
        var form = $('#probation_unit_form').get(0);
        var data = new FormData(form);

        if($('#btnSave').text().trim()=='Save'){
            save(data);
        }
        else{
            update(data);
        }

    });
    $('#district').on('change', function () {
        loadDivitionalSecatariat(this.value);
    });
    loadDistrict()
    loadProbationUnit() ;
});

function loadDistrict(){
    $.ajax({
        type: 'GET',
        url: '/register_Probation_unit/loadDistrict',
        async:false,
        success: function(response){
            console.log(response.result)
            if (response.success) {
                var html = "";
                $.each(response.result, function(index, value){

                    html += '<option value="'+value.id+'" > '+value.district+' </option>';
                });
                $('#district').append(html);


            }
        }, error: function(data){
            console.log(data);
            console.log('something went wrong');
        }
    });
}
function loadDivitionalSecatariat(id){
    $.ajax({
        type: 'GET',
        url: '/register_Probation_unit/loadDivitionalSecatariat/'+id,
        async:false,
        success: function(response){
            console.log(response.result)
            if (response.success) {
                var html = "";
                $.each(response.result, function(index, value){

                    html += '<option value="'+value.id+'" > '+value.name+' </option>';
                });
                $('#divitional_secretariat').html(html);


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

function update(data){
    $.ajax({
        type: "POST",
        url: "/register_Probation_unit/update",
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
                location.href='/probationUnitList'
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

function loadProbationUnit() {

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
            url: "/register_Probation_unit/loadProbationUnit/" + id,
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
                    $('#txtid').val(data.Probation_unit_id);
                    $('#name').val(data.name);
                    $('#address').val(data.address);
                    $('#district').val(data.district);
                    loadDivitionalSecatariat(data.district);
                    $('#divitional_secretariat').val(data.divitional_secretariat);
                    $('#senior_officer').val(data.senior_officer);
                    $('#officer_incharge').val(data.officer_incharge);
                    $('#tp_no').val(data.tp_no);
                    $('#fax').val(data.fax);
                    $('#email').val(data.email);
                    $('#remarks').val(data.remarks);

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
    $('#address').val('');
    $('#district').val('');
    $('#divitional_secretariat').val('');
    $('#senior_officer').val('');
    $('#officer_incharge').val('');
    $('#tp_no').val('');
    $('#fax').val('');
    $('#email').val('');
    $('#remarks').val('');


}


