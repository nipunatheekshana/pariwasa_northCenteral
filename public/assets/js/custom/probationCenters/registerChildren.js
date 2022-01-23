console.log('registerChildren.js');
$(document).ready(function() {

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
        var form = $('#probation_Unit_employee_form').get(0);
        var data = new FormData(form);

        if($('#btnSave').text().trim()=='Save'){
            save(data);
        }
        else{
            update(data);
        }

    });

});
