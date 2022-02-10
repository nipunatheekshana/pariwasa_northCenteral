console.log('dashbord.js loading');
$(document).ready(function() {



    $('#btnSave').on('click', function () {
        var form = $('#probation_center_form').get(0);
        var data = new FormData(form);

        update(data);
    });
    $('#district').on('change', function () {

        loadDivitionalSecatariat(this.value);
        $('#gramasevaDivition').val('');
        $('#gramaseva_divition').val('');
    });
    $('#divitional_secretariat').on('change', function () {

        loadGramasevadivision(this.value);
        $('#gramasevaDivition').val('');
        $('#gramaseva_divition').val('');
    });

    loadcatagories();
    loadDistrict();
    loadProbationCenter() ;


});

function autoCompleteSelectedOption(input, data) {
    $('#gramaseva_divition').val(data.id);
}

function loadDistrict(){
    $.ajax({
        type: 'GET',
        url: '/createProbationCenter/loadDistrict',
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
        url: '/createProbationCenter/loadDivitionalSecatariat/'+id,
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
function loadGramasevadivision(id){
    $.ajax({
        type: 'GET',
        url: '/createProbationCenter/loadGramasevadivision/'+id,
        async:false,
        success: function(response){
            // console.log(response.result)
            console.log(response);
            if (response.success) {
                $('#gramasevaDivition').setData(response.result)
            } else {
                console.log('something went wrong');
            }
        }, error: function(data){
            console.log(data);
            console.log('something went wrong');
        }
    });
}

function loadcatagories(){
    $.ajax({
        type: 'GET',
        url: '/createProbationCenter/loadcatagories',
        async:false,
        success: function(response){
            console.log(response.result)
            if (response.success) {
                var html = "";
                $.each(response.result, function(index, value){

                    html += '<option value="'+value.id+'" > '+value.category+' </option>';
                });
                $('#catagory').append(html);


            }
        }, error: function(data){
            console.log(data);
            console.log('something went wrong');
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
                location.href='/probationCenterUserDashbord'
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
    var id ='';
    $.ajax({
        type: 'GET',
        url: '/probationCenterUserDashbord/loadProbationCenterID',
        async:false,
        success: function(response){
            console.log(response.result)
            if (response.success) {
                 id = response.result
            }
        }, error: function(data){
            console.log(data);
            console.log('something went wrong');
        }
    });

    if (!id==''){
        $.ajax({
            type: "GET",
            url: "/createProbationCenter/loadProbationCenter/" + id,
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
                    $('#name').val(data.name);
                    $('#date_started').val(data.date_started);
                    $('#catagory').val(data.catagory);
                    $('#district').val(data.district);
                    loadGramasevadivision(data.divitional_secretariat);
                    loadDivitionalSecatariat(data.district);

                    $('#divitional_secretariat').val(data.divitional_secretariat);
                    $('#tp_no').val(data.tp_no);
                    $('#registration_no').val(data.registration_no);
                    $('#registration_date').val(data.registration_date);
                    $('#fund').val(data.fund);
                    $('#gramasevaDivition').val(data.gramasewaname);
                    $('#gramaseva_divition').val(data.gramaseva_divition);
                    $('#maximum_children_capacity').val(data.maximum_children_capacity);
                    $('#number_of_children').val(data.number_of_children);
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
    $('#number_of_children').val('');
    $('#address').val('');





}


