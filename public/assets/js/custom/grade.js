console.log('grade.js');

$(document).ready(function () {

    $('#tblgrade').DataTable({
        scrollY: 600,
        scrollX: true,
        scrollCollapse: true,
        "order": [],
        'columnDefs': [
            {
                "targets": '_all',
                "createdCell": function (td) {
                    $(td).css('padding', '2px')
                }
            }],
        "columns": [
          { "data": "thid" },
          { "data": "thname" },
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

    $('#btnexpt').on('click', function () {
        ExportExcel('xlsx');
    });


    loadgrade();

});




function save(data) {

    $.ajax({
        type: "POST",
        url: "/grade/save",
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
                loadgrade();

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
        url: "/grade/update",
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
                loadgrade();

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
function loadgrade(){
    $.ajax({
        type: 'GET',
        url: '/grade/loadGrade',
        success: function(response){
            console.log(response.result)
            if (response.success) {

                var data = [];
                for (i = 0; i < response.result.length; i++) {
                    var name  = response.result[i]['name'];
                    var id  = response.result[i]['id'];


                    data.push({
                        "thid": id,
                        "thname":name,
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
        url: '/grade/delete/'+id,
        success: function(response){
              console.log(response);
              loadgrade();


        }, error: function(data){
            // console.log('something went wrong');
        }
    });
}
function edit(id) {

    $.ajax({
        type: 'GET',
        url: '/grade/loadGrade/'+id,
        success: function(response){
            console.log(response.result.name)
            if (response.success) {
                $('#name').val(response.result.name);
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

