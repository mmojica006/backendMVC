/**
 * Created by Mosses on 13/02/2018.
 */
loadCKEbasic("mision");
loadCKEbasic("vision");
loadCKEbasic("valores");
loadCKEbasic("nosotrosDescripcion");



$.post("ajax/nosotros.ajax.php",
    {"action":"RutaServidor"},
    function(response){
    console.log(response);



});


$("#subirImgNosotros").change(function(){

    var img = this.files[0];


    if(img["type"] != "image/jpeg" && img["type"] != "image/png"){

        $("#subirImgNosotros").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });



    }
    else if(img["size"] > 2000000){

        $("#subirImgNosotros").val("");

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
        datosImg.readAsDataURL(img);

        $(datosImg).on("load", function(event){

            var rutaImagen = event.target.result;

            $(".previsualizarImgNosotros").attr("src", rutaImagen);

        })

    }

    $("#guardarImgNosotros").click( function (){
        var datos = new FormData();
        datos.append("imgNosotros",img);

        $.ajax({

            url:"ajax/nosotros.ajax.php",
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


$("#guardarDataBanner").click(function(){

    var bannerTitulo =  $("#bannerTitulo").val();
    var bannerDesc = $("#bannerDesc").val();

    var datos = new FormData();
    datos.append("bannerTitulo",bannerTitulo);
    datos.append("bannerDesc",bannerDesc);

    $.ajax({
        url:"ajax/nosotros.ajax.php",
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


$("#guardarInfoNosotros1").click(function(){

    for (var instanceName in CKEDITOR.instances) {
        CKEDITOR.instances[instanceName].updateElement();
    }

    var titulo =  $("#titulo").val();
    var descripcion = $("#nosotrosDescripcion").val();



    var datos = new FormData();
    datos.append("titulo",titulo);
    datos.append("descripcion",descripcion);

    $.ajax({
        url:"ajax/nosotros.ajax.php",
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

$("#guardarInfoNosotros2").click(function(){

    for (var instanceName in CKEDITOR.instances) {
        CKEDITOR.instances[instanceName].updateElement();
    }

    var mision =  $("#mision").val();
    var vision = $("#vision").val();
    var valores = $("#valores").val();

    var datos = new FormData();
    datos.append("mision",mision);
    datos.append("vision",vision);
    datos.append("valores",valores);
    console.log(datos.mision);

    $.ajax({
        url:"ajax/nosotros.ajax.php",
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


        var dialogName = e.data.name;
        var dialogDefinition = e.data.definition;



        if ( dialogName == 'image' )
        {

            dialogDefinition.removeContents( 'link' );
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
    CKEDITOR.config.baseUrl = "http://www.yourdomain.com/assets/images/";








}