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
                    var data = response.result['child'];

                    if(!data.image==''){
                        $("#userImage").attr("src",data.image);
                        $("#userImagelarge").attr("href",data.image);

                        $('#oldimage').val(data.image);
                    }
                    $('#txtid').val(data.id);
                    $('#name').val(data.full_name);
                    $('#initials').val(data.initials);
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
                        $('#hasEducation').prop( "checked", true );
                        $('#addEducation').attr('disabled', false);

                        var education =  response.result['education'];

                        if(!education==''){
                            loadeducation(education);
                        }
                    }
                    if(data.hasParents==true){
                        $('#hasParents').prop( "checked", true );
                        $('#addParents').attr('disabled', false);

                        var parentDetails =  response.result['parentDetails'];

                        if(!parentDetails==''){
                            loadparents(parentDetails);
                        }
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


function loadparents(data){
    $('#mothers_name').val(data.mothers_name);
    $('#mothers_name_initial').val(data.mothers_name_initial);
    $('#mothers_DOB').val(data.mothers_DOB);
    $('#mothers_tp_no').val(data.mothers_tp_no);
    $('#mothers_job').val(data.mothers_job);
    $('#mothers_religion').val(data.mothers_religion);
    $('#mothers_address').val(data.mothers_address);
    $('#mothers_education_qulifications').val(data.mothers_education_qulifications);
    $('#fathers_name').val(data.fathers_name);
    $('#fathers_name_initial').val(data.fathers_name_initial);
    $('#fathers_DOB').val(data.fathers_DOB);
    $('#fathers_tp_no').val(data.fathers_tp_no);
    $('#fathers_job').val(data.fathers_job);
    $('#fathers_address').val(data.fathers_address);

}

function loadeducation(data){
    $('#school_name').val(data.school_name);
    $('#grade').val(data.grade);
    $('#skills').val(data.skills);
    $('#aesthetics').val(data.aesthetics);
    $('#extra_curiculars').val(data.extra_curiculars);
    $('#school_subjects').val(data.school_subjects);
    $('#school_address').val(data.school_address);
    $('#diploma_contactNum').val(data.diploma_contactNum);
    $('#diploma_subjects').val(data.diploma_subjects);
    $('#diploma_higherEducation').val(data.diploma_higherEducation);
    $('#diploma_address').val(data.diploma_address);
    $('#uni_contact_num').val(data.uni_contact_num);
    $('#uni_subjects').val(data.uni_subjects);
    $('#uni_address').val(data.uni_address);
    $('#probation_officers_followUp').val(data.probation_officers_followUp);
}

function reset(){
    $('#txtid').val('');
    $('#name').val('');
    $('#initials').val('');
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

    $('#mothers_name').val('');
    $('#mothers_name_initial').val('');
    $('#mothers_DOB').val('');
    $('#mothers_tp_no').val('');
    $('#mothers_job').val('');
    $('#mothers_religion').val('');
    $('#mothers_address').val('');
    $('#mothers_education_qulifications').val('');
    $('#fathers_name').val('');
    $('#fathers_name_initial').val('');
    $('#fathers_DOB').val('');
    $('#fathers_tp_no').val('');
    $('#fathers_job').val('');
    $('#fathers_address').val('');


    $('#school_name').val('');
    $('#grade').val('');
    $('#skills').val('');
    $('#aesthetics').val('');
    $('#extra_curiculars').val('');
    $('#school_subjects').val('');
    $('#school_address').val('');
    $('#diploma_contactNum').val('');
    $('#diploma_subjects').val('');
    $('#diploma_higherEducation').val('');
    $('#diploma_address').val('');
    $('#uni_contact_num').val('');
    $('#uni_subjects').val('');
    $('#uni_address').val('');
    $('#probation_officers_followUp').val('');

}
