/**
 * Created by Mosses on 11/03/2018.
 */


var dataTable = $('#user_data').DataTable({
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
        url:"ajax/perfiles.ajax.php",
        type:"POST"
    },
    "columnDefs":[
        {
            "targets":[0, 3, 4],
            "orderable":false,
        },
    ],

});