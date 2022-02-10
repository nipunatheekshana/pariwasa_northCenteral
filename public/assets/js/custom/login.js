
$(document).ready(function () {



    toastr.options = {
        timeOut: 4000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 200
    };


    //


    $('#btnLogIn').on('click', function (event) {
        event.preventDefault();
        var data = $('#loginForm').serialize();
        // var data = new FormData(form);

        $.ajax({
            type: "POST",
            url: "/login",
            data: data,
            beforeSend: function () {

            },
            success: function (response) {
                console.log(response);

                // if (response == '200'){
                //     location.href = '/dashbord';
                // }

                if (response.status == '200') {

                    if(response.role=='admin'){
                        location.href = '/Admindashbord';
                    }
                    else if(response.role=='probationUnitUser'){
                        location.href = '/probationUnitUserDashbord';
                    }
                    else{
                        location.href = '/probationCenterUserDashbord';
                    }

                } else {
                    toastr.error('Wrong Login Details....');
                }
            },
            error: function (error) {
                console.log(error);

            },
            complete: function () {

            }

        });

    });

});
