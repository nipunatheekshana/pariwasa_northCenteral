console.log('registerChildren.js');
$(document).ready(function() {
    $('#addParents').attr('disabled', true);
    $('#addEducation').attr('disabled', true);


    // image pop
    $('.image-popup').magnificPopup({
        type: 'image',
        zoom: {
            enabled: true,
            duration: 300,
            easing: 'ease-in-out',
            opener: function(openerElement) {
                return openerElement.is('img') ? openerElement : openerElement.find('img');
            }
        }
    });


    $('#btnSave').on('click', function () {
        var form = $('#probation_Center_children').get(0);
        var data = new FormData(form);

        if($('#btnSave').text().trim()=='Save'){
            save(data);
        }
        else{
            update(data);
        }

    });

    $('#hasParents').change(function () {

        if (this.checked) {
            $('#addParents').attr('disabled', false);
        } else {
            $('#addParents').attr('disabled', true);
        }

    });
    $('#hasEducation').change(function () {

        if (this.checked) {
            $('#addEducation').attr('disabled', false);
        } else {
            $('#addEducation').attr('disabled', true);
        }

    });

    $('#addParents').on('click', function () {
        $('#parentsModel').modal('toggle');
    });
    $('#addEducation').on('click', function () {
        $('#educationModel').modal('toggle');
    });

    loadChild()

});
function save(data){
    $.ajax({
        type: "POST",
        url: "/registerChildren/save",
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
                toastr.success('Child Registered');
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
        url: "/registerChildren/update",
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
                toastr.success('Child Updated');
                reset();
                location.href='/childrenList'
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

function loadChild() {

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
            url: "/registerChildren/loadChild/" + id,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 800000,
            async:false,
            beforeSend: function () {

            },
            success: function (response) {

                console.log(response)
                if (response.success) {

                    console.log(response.result);
                    var data = response.result;


                    if(!data.image==''){
                        $("#userImage").attr("src",data.image);
                        $('#oldimage').val(data.image);
                    }
                    $('#txtid').val(data.id);
                    $('#name').val(data.full_name);
                    $('#Dob').val(data.DOB);
                    $('#date_entered').val(data.date_entered);
                    $('#gender').val(data.gender);
                    $('#nationality').val(data.nationality);
                    $('#religion').val(data.religion);
                    $('#birth_certificate').val(data.birth_certificate);
                    $('#helth_status').val(data.helth_status);
                    $('#disability').val(data.disability);
                    $('#how_entered').val(data.how_entered);
                    $('#status_before_enter').val(data.status_before_enter);
                    $('#status_after_entered').val(data.status_after_enter);
                    $('#Entered_divition').val(data.Entered_divition);
                    $('#court').val(data.court);
                    $('#case_number').val(data.case_number);
                    $('#crime_commited').val(data.crime_commited);
                    if(data.hasEducation==true){
                        $('#hasEducation').prop( "checked", true );;
                    }
                    if(data.hasParents==true){
                        $('#hasParents').prop( "checked", true );;
                    }

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
    $('#txtid').val('');
    $('#name').val('');
    $('#image').val('');
    $('#oldimage').val('');
    $('#Dob').val('');
    $('#date_entered').val('');
    $('#gender').val('');
    $('#nationality').val('');
    $('#religion').val('');
    $('#birth_certificate').val('');
    $('#helth_status').val('');
    $('#disability').val('');
    $('#how_entered').val('');
    $('#status_before_enter').val('');
    $('#status_after_entered').val('');
    $('#Entered_divition').val('');
    $('#court').val('');
    $('#case_number').val('');
    $('#crime_commited').val('');

}
