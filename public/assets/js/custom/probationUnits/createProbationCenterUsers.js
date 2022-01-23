console.log('createProbationCenterUsers.js loading');
$(document).ready(function() {

    $('#btnSave').on('click', function () {
        var form = $('#createUserForm').get(0);
        var data = new FormData(form);

        if($('#btnSave').text().trim()=='Save'){
            save(data);
        }
        else{
            //function is also commeted below
            // update(data);
        }

    });
    loadProbationCenters();
    loadProbationCenterUser() ;

});



function save(data){
    $.ajax({
        type: "POST",
        url: "/createProbationCenterUsers/saveProbationCenterUser",
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
                toastr.success('Probation Center User Created');
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

// function update(data){
//     $.ajax({
//         type: "POST",
//         url: "/createProbationUnitUser/updateProbationUnitUser",
//         data: data,
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         processData: false,
//         contentType: false,
//         cache: false,
//         timeout: 800000,
//         beforeSend: function () {

//         },
//         success: function (response) {
//             console.log(response);
//             if(response.data.success){
//                 toastr.success('Probation Center Updated');
//                 reset();
//                 location.href='/probationUnitList'
//             }
//             else{
//                 toastr.error('Something went wrong');

//             }

//         },
//         error: function (error) {
//             console.log(error);

//             if (error.status == 422) { // when status code is 422, it's a validation issue
//                 console.log(error.responseJSON);
//                 // you can loop through the errors object and show it to the user
//                 console.warn(error.responseJSON.errors);
//                 // display errors on each form field
//                 $.each(error.responseJSON.errors, function (i, error) {
//                     var el = $(document).find('[name="'+i+'"]');
//                     el.after($('<span style="color: red;">'+error[0]+'</span>'));
//                     toastr.warning(error[0]);
//                     console.clear()

//                 });
//             }
//             else{
//                 toastr.error('Something went wrong');
//             }
//         },
//         complete: function () {

//         }

//     });
// }
function loadProbationCenters(){
    $.ajax({
        type: 'GET',
        url: '/createProbationCenterUsers/loadProbationCenters',
        async:false,
        success: function(response){
            console.log(response)
            if (response.success) {
                var html = "";
                $.each(response.result, function(index, value){

                    html += '<option value="'+value.probation_center_id+'" > '+value.name+' </option>';
                });
                $('#probationCenterid').html(html);


            }
        }, error: function(data){
            console.log('something went wrong');
        }
    });
}

function loadProbationCenterUser() {

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
            url: "/createProbationCenterUsers/loadProbationCenterUser/" + id,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 800000,
            async:false,
            beforeSend: function () {

            },
            success: function (response) {

                if (response.success) {

                    console.log(response.result);
                    var data = response.result;
                    $('#probationCenterid').val(data.probationCenterId);
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#hiddenuserid').val(data.id);
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
    $('#email').val('');
    $('#hiddenuserid').val('');
    $('#Password').val('');
    $('#password_confirmation').val('');




}


