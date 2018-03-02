/**
 * Created by Mosses on 16/02/2018.
 */

loadCKEbasic("contactDescripcion");





var dataTable = $('#user_data').DataTable({
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
        url:"ajax/Canales.ajax.php",
        type:"POST"
    },
    "columnDefs":[
        {
            "targets":[0, 3, 4],
            "orderable":false,
        },
    ],

});



$('#add_button').click(function(){
    $('#user_form')[0].reset();
    $('.modal-title').text("Agregar");
    $('#action').val("Add");
    $('#operation').val("Add");
    $('#user_uploaded_image').html('');
});



$(document).on('submit', '#user_form', function(event){
    event.preventDefault();
    var sucursal = $('#sucursal').val();
    var latitud = $('#latitud').val();
    var longitud = $('#longitud').val();

    if(sucursal != '' && latitud != '' && longitud != '')
    {
        $.ajax({
            url:"ajax/Canales.ajax.php",
            method:'POST',
            data:new FormData(this),
            contentType:false,
            processData:false,
            success:function(data)
            {


                $('#user_form')[0].reset();
                $('#userModal').modal('hide');
                dataTable.ajax.reload();

                swal({
                    title: "Direcciones de Sucursales",
                    text: "¡Registro Actualizado!",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                });


            }
        });
    }
    else
    {
        swal({
            title: "Error al guardar el registro",
            text: 'Hacen falta datos' ,
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    }
});


$(document).on('click', '.update', function(){

    var market_id = $(this).attr("id");

    $.ajax({
        url:"ajax/Canales.ajax.php",
        method:"POST",
        data:{market_id:market_id},
        dataType:"json",
        success:function(data)
        {
            $('#userModal').modal('show');
            $('#sucursal').val(data.name);
            $('#latitud').val(data.lat);
            $('#longitud').val(data.lng);

            $('.modal-title').text("Actualizar");
            $('#market_id').val(market_id);
            $('#action').val("Actualizar");
            $('#operation').val("Edit");

        }
    })
});

$(document).on('click', '.delete', function(){
    var market_id = $(this).attr("id");
    if(confirm("Esta seguro de borrar el registro?"))
    {
        $.ajax({
            url:"ajax/Canales.ajax.php",
            method:"POST",
            data:{"operation":"Del","market_id":market_id},
            success:function(respuesta)
            {
                    dataTable.ajax.reload();
            }
        });
    }
    else
    {
        return false;
    }
});

$("#subirImgCanales").change(function(){

    var imgCanales = this.files[0];


    if(imgCanales["type"] != "image/jpeg" && imgCanales["type"] != "image/png"){

        $("#subirImgCanales").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });



    }
    else if(imgCanales["size"] > 2000000){

        $("#subirImgCanales").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

        /*=============================================
         PREVISUALIZAMOS LA IMAGEN
         =============================================*/

    }else{

        var datosImg = new FileReader;
        datosImg.readAsDataURL(imgCanales);

        $(datosImg).on("load", function(event){

            var rutaImagen = event.target.result;

            $(".previsualizarImgCanales").attr("src", rutaImagen);

        })

    }

    $("#guardarImgCanales").click( function (){
        var datos = new FormData();
        datos.append("imgCanales",imgCanales);

        $.ajax({

            url:"ajax/Canales.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta){

                if(respuesta.num === 0){

                    swal({
                        title: "Cambios guardados",
                        text: "¡Fondo Actualizado!",
                        type: "success",
                        confirmButtonText: "¡Cerrar!"
                    });

                }else if(respuesta.num === 1){

                    swal({
                        title: "Error al subir la imagen",
                        text: respuesta.msg ,
                        type: "error",
                        confirmButtonText: "¡Cerrar!"
                    });
                }


            }

        });


    });





});


$("#guardarInfoContacto").click(function(){

    for (var instanceName in CKEDITOR.instances) {
        CKEDITOR.instances[instanceName].updateElement();
    }

    var titulo =  $("#titulo").val();
    var descripcion = $("#contactDescripcion").val();



    var datos = new FormData();
    datos.append("titulo",titulo);
    datos.append("descripcion",descripcion);

    $.ajax({
        url:"ajax/contacto.ajax.php",
        method: "POST",
        data: datos,
        cache:false,
        contentType:false,
        processData: false,
        dataType: "json",
        success: function (respuesta){

            if(respuesta.num === 0){

                swal({
                    title: "Cambios guardados",
                    text: "Datos Actualizados",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                });

            }else{
                swal({
                    title: "Error al guardar los datos",
                    text: respuesta.msg,
                    type: "error",
                    confirmButtonText: "¡Cerrar!"
                });
            }

        }

    });

});


$("#guardarDataBanner").click(function(){

    var bannerTitulo =  $("#bannerTitulo").val();
    var bannerDesc = $("#bannerDesc").val();

    var datos = new FormData();
    datos.append("bannerTitulo",bannerTitulo);
    datos.append("bannerDesc",bannerDesc);

    $.ajax({
        url:"ajax/contacto.ajax.php",
        method: "POST",
        data: datos,
        cache:false,
        contentType:false,
        processData: false,
        dataType: "json",
        success: function (respuesta){

            if(respuesta.num === 0){

                swal({
                    title: "Cambios guardados",
                    text: "Datos Actualizados",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                });

            }else{
                swal({
                    title: "Error al guardar los datos",
                    text: respuesta.msg,
                    type: "error",
                    confirmButtonText: "¡Cerrar!"
                });
            }

        }

    });

});



function loadCKEbasic(id) {
    var instance = CKEDITOR.instances[id];
    if (instance) {
        CKEDITOR.remove(instance);
    }

    CKEDITOR.on('instanceReady', function() {
        $(".cke_button__source_label").text("View Source");

    });



    CKEDITOR.on('dialogDefinition', function (e) {

        console.log('Ready');
        var dialogName = e.data.name;
        var dialogDefinition = e.data.definition;



        if ( dialogName == 'image' )
        {

            dialogDefinition.removeContents( 'Link' );
            dialogDefinition.removeContents( 'advanced' );

            dialogDefinition.dialog.resize( 600, 200 );

            var infoTab = dialogDefinition.getContents( 'info' );
            var altField = infoTab.get('txtUrl');
            var altFieldBrowser = infoTab.get('browse');

            infoTab.remove( 'txtBorder');
            infoTab.remove( 'txtHSpace');
            infoTab.remove( 'txtVSpace');
            infoTab.remove( 'previewImage');
            infoTab.remove( 'alternativeText');
            infoTab.remove( 'txtAlt');


            altField.label ='Link <span class="form-required" title="This field is required.">*</span>';


            altFieldBrowser.label ='Upload image';





        }

    });


    CKEDITOR.replace(id,
        {
            toolbar: [
                { name: 'document', items: [ 'NewPage' , '-','Source'  ] },
                [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ],
                ['Font', 'FontSize', 'TextColor'],
                '/',
                ['Bold', 'Italic', 'Underline'],
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'    ] },
                { name: 'styles', items: [ 'Format'] },
                { name: 'insert', items: [ 'Image', 'HorizontalRule'  ] },
                { name: 'tools', items: [ 'Maximize','Link', 'Unlink' ] }


            ]
        });


    CKEDITOR.config.fontSize_sizes='8/8px;9/9px;10/10px;11/11px;12/12px;14/14px;16/16px;18/18px;20/20px;22/22px' ;
    CKEDITOR.config.baseFloatZIndex = 9000;


    CKEDITOR.config.filebrowserBrowseUrl =  './vistas/plugins/kcfinder-3.12/browse.php?opener=ckeditor&type=files';
    CKEDITOR.config.filebrowserImageBrowseUrl = './vistas/plugins/kcfinder-3.12/browse.php?opener=ckeditor&type=images';
    CKEDITOR.config.filebrowserFlashBrowseUrl = './vistas/plugins/kcfinder-3.12/browse.php?opener=ckeditor&type=flash';
    CKEDITOR.config.filebrowserUploadUrl = './vistas/plugins/kcfinder-3.12/upload.php?opener=ckeditor&type=files';
    CKEDITOR.config.filebrowserImageUploadUrl = './vistas/plugins/kcfinder-3.12/upload.php?opener=ckeditor&type=images';
    CKEDITOR.config.filebrowserFlashUploadUrl = './vistas/plugins/kcfinder-3.12/upload.php?opener=ckeditor&type=flash';

    CKEDITOR.config.removeDialogTabs = 'image:Upload;image:Link;image:advanced';





}







