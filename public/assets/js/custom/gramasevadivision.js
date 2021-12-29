console.log('gramasevadivision.js');

$(document).ready(function () {

    $('#tblgrade').DataTable({
        responsive: true,
        "order": [],
        "columns": [
          { "data": "thid" },
          { "data": "thname" },
          { "data": "thDVSname" },
          { "data": "edit" },
          { "data": "delete" },
        ],
    });

    $('#btnsave').on('click', function () {
        var form = $('#dform').get(0);
        var data = new FormData(form);

        if($('#btnsave').text().trim()=='Save'){
            save(data);
        }
        else{
            update(data);
        }

    });

    loadgramasevadivision();
    loaddivitionalSecretariat();

});
function loaddivitionalSecretariat(){
    $.ajax({
        type: 'GET',
        url: '/divitionalSecretariat/loaddivitionalSecretariat',
        success: function(response){
            console.log(response.result)
            if (response.success) {
                var html = "";
                $.each(response.result, function(index, value){

                    html += '<option value="'+value.id+'" > '+value.name+' </option>';
                });
                $('#divitional_secretariat').append(html);

            }
        }, error: function(data){
            console.log('something went wrong');
        }
    });
}

function save(data) {

    $.ajax({
        type: "POST",
        url: "/gramasevadivision/save",
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
            if(response.success){
                toastr.success('data saved');
                reset();
                loadgramasevadivision();

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
function update(data) {

    $.ajax({
        type: "POST",
        url: "/gramasevadivision/update",
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
            if(response.success){
                toastr.success('data Updated');
                reset();
                loadgramasevadivision();

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
function loadgramasevadivision(){
    $.ajax({
        type: 'GET',
        url: '/gramasevadivision/loadgramasevadivision',
        success: function(response){
            console.log(response.result)
            if (response.success) {

                var data = [];
                for (i = 0; i < response.result.length; i++) {
                    var name  = response.result[i]['name'];
                    var id  = response.result[i]['id'];
                    var DVSname  = response.result[i]['DVSname'];



                    data.push({
                        "thid": id,
                        "thname":name,
                        "thDVSname":DVSname,
                        "edit": '<button class="btn btn-primary" onclick="edit(' + id + ')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>',
                        "delete": '<button class="btn btn-danger" onclick="_delete(' + id + ')"><i class="fa fa-trash" aria-hidden="true"></i></button>'
                     });
                }

                var table = $('#tblgrade').DataTable();
                table.clear();
                table.rows.add(data).draw();
            }
        }, error: function(data){
            console.log('something went wrong');
        }
    });
}
function _delete(id) {
    $.ajax({
        type: 'DELETE',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '/gramasevadivision/delete/'+id,
        success: function(response){
              console.log(response);
              loadgramasevadivision();


        }, error: function(data){
            // console.log('something went wrong');
        }
    });
}
function edit(id) {

    $.ajax({
        type: 'GET',
        url: '/gramasevadivision/loadgramasevadivision/'+id,
        success: function(response){
            console.log(response.result.name)
            if (response.success) {
                $('#name').val(response.result.name);
                $('#divitional_secretariat').val(response.result.divisionalSecretariatID);
                $('#txtid').val(response.result.id);
                $('#btnsave').text('Update');
            }
        }, error: function(data){
            console.log('something went wrong');
        }
    });

}

function reset(){
    $('#name').val('');
    $('#txtid').val('');
    $('#btnsave').text('Save');
}

