console.log('dashbord.js')
$(document).ready(function() {

    $('#tblUnits').DataTable({
        responsive: true,
        'columnDefs': [{
                "targets":  [0,1,2,3] ,
                "className": "text-center",
           }],
        "order": [],
        "columns": [
          { "data": "thid" },
          { "data": "thname" },
          { "data": "thDistrict" },
          { "data": "thOfficer" },
        ],
    });
    loadUnits();
});

function loadUnits(){
    $.ajax({
        type: 'GET',
        url: '/dashbord/loadUnits',
        success: function(response){
            console.log(response.data.result)
            if (response.data.success) {

                var data = [];
                for (i = 0; i < response.data.result.length; i++) {
                    var id  = response.data.result[i]['Probation_unit_id'];
                    var name  = response.data.result[i]['name'];
                    var district  = response.data.result[i]['district'];
                    var officer  = response.data.result[i]['officer_incharge'];

                    data.push({
                        "thid": id,
                        "thname":name,
                        "thDistrict":district,
                        "thOfficer":officer,
                     });
                }

                var table = $('#tblUnits').DataTable();
                table.clear();
                table.rows.add(data).draw();
            }
        }, error: function(data){
            console.log('something went wrong');
        }
    });
}
