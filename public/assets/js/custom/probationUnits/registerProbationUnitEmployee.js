console.log('registerProbationUnitEmployee.js loading');
$(document).ready(function() {
    // image poo
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
        var form = $('#probation_Unit_employee_form').get(0);
        var data = new FormData(form);

        if($('#btnSave').text().trim()=='Save'){
            save(data);
        }
        else{
            update(data);
        }

    });

    loadpoliceDevition();
    loadDivitionalSecatariat();
    loadDDesignation();
    loadGrade();
    loadProbationUnitEmployee() ;
});
function autoCompleteSelectedOption(input, data) {
    $('#working_police_divition').val(data.id);
}
function loadDivitionalSecatariat(){
    $.ajax({
        type: 'GET',
        url: '/divitionalSecretariat/loaddivitionalSecretariat',
        async:false,
        success: function(response){
            console.log(response.result)
            if (response.success) {
                var html = "";
                $.each(response.result, function(index, value){

                    html += '<option value="'+value.id+'" > '+value.name+' </option>';
                });
                $('#working_divitional_secretariat').append(html);


            }
        }, error: function(data){
            console.log(data);
            console.log('something went wrong');
        }
    });
}
function loadDDesignation(){
    $.ajax({
        type: 'GET',
        url: '/designation/loaddesignation',
        async:false,
        success: function(response){
            console.log(response.result)
            if (response.success) {
                var html = "";
                $.each(response.result, function(index, value){

                    html += '<option value="'+value.id+'" > '+value.name+' </option>';
                });
                $('#designation').html(html);


            }
        }, error: function(data){
            console.log(data);
            console.log('something went wrong');
        }
    });
}
function loadGrade(){
    $.ajax({
        type: 'GET',
        url: '/grade/loadGrade',
        async:false,
        success: function(response){
            console.log(response.result)
            if (response.success) {
                var html = "";
                $.each(response.result, function(index, value){

                    html += '<option value="'+value.id+'" > '+value.name+' </option>';
                });
                $('#grade').html(html);


            }
        }, error: function(data){
            console.log(data);
            console.log('something went wrong');
        }
    });
}
function loadpoliceDevition(){
    $.ajax({
        type: 'GET',
        url: '/registerProbationUnitEmployee/loadpoliceDevition',
        async:false,
        success: function(response){
            console.log(response.result)
             // console.log(response.result)
             console.log(response);
             if (response.success) {
                 $('#policeDivition').setData(response.result);
             } else {
                 console.log('something went wrong');
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
        url: "/registerProbationUnitEmployee/save",
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
                toastr.success('Employee Created');
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
        url: "/registerProbationUnitEmployee/update",
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
                toastr.success('Employee Updated');
                reset();
                location.href='/probationUnitEmployeeList'
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

function loadProbationUnitEmployee() {

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
            url: "/registerProbationUnitEmployee/loadProbationUnitEmployee/" + id,
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

                    if(!data.working_divitional_secretariat==''){
                        loadpoliceDevition(data.working_divitional_secretariat)
                    }

                    if(!data.image==''){
                        $("#userImage").attr("src",data.image);
                        $('#oldimage').val(data.image);
                    }
                    $('#txtid').val(data.employee_id);
                    $('#name').val(data.full_name);
                    $('#title').val(data.title);
                    $('#address').val(data.address);
                    $('#designation').val(data.designation);
                    $('#grade').val(data.grade);
                    $('#contact_no').val(data.tp_no);
                    $('#gender').val(data.gender);
                    $('#NIC_no').val(data.NIC_no);
                    $('#date_of_employeement_at_probational_unit').val(data.date_of_employeement_at_probational_unit);
                    $('#working_divitional_secretariat').val(data.working_divitional_secretariat);
                    $('#working_police_divition').val(data.working_police_divition);
                    $('#policeDivition').val(data.name);
                    $('#working_equipment').val(data.working_equipment);
                    $('#DOB').val(data.DOB);
                    $('#email').val(data.email);
                    $('#date_of_employeement').val(data.date_of_employeement);
                    $('#pension_no').val(data.pension_no);
                    $('#basic_salary').val(data.basic_salary);
                    $('#Incriment_date').val(data.Incriment_date);
                    $('#incriment_value').val(data.incriment_value);
                    $('#Education_qualifications').val(data.Education_qualifications);
                    $('#other_qualification').val(data.other_qualification);
                    $('#courses_falloed_by_the_institute').val(data.courses_falloed_by_the_institute);
                    $('#courses_hope_to_fallow').val(data.courses_hope_to_fallow);
                    if(data.isExecutive==true){
                        $('#isExce').prop( "checked", true );;
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
    $('#name').val('');
    $('#address').val('');
    $('#designation').val('');
    $('#contact_no').val('');
    $('#gender').val('');
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
    $('#policeDivition').val();
}


