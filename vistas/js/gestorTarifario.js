


loadCKEbasic("tarifarioDesc");


var dataTable = $('#user_dataEEFF').DataTable({
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
        url:"ajax/tarCont.ajax.php",
        type:"POST"
    },
    "columnDefs":[
        {
            "targets":[0, 1, 2],
            "orderable":false,
        },
    ],

});


$("#subirPdf").change(function () {

    var pdfFile = this.files[0];

    console.log(pdfFile);

    if (pdfFile["type"] != "application/pdf") {

        $("#subirPdf").val("");

        swal({
            title: "Error al subir el archivo",
            text: "¡El formato debe ser PDF!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });


    } else if (pdfFile["size"] > 2000000) {

        $("#subirPdf").val("");

        swal({
            title: "Error al subir el archivo",
            text: "¡Debe de pesar un máximo de  2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

        /*=============================================
         PREVISUALIZAMOS LA IMAGEN
         =============================================*/

    } else {

        $(".previsualizarImgPdf").after('<div class="msgCargado alert alert-success fade in">Archivo Cargada</div>');



    }

    $("#guardarPdf").click(function(){

        if ($("#subirPdf").val()!=''){

            var datos = new FormData();

            datos.append("archivoPdf",pdfFile);


            $.ajax({

                url:"ajax/tarCont.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta){




                    if(respuesta.num === 0){


                        $('.msgCargado').css('display','none');
                        $(".previsualizarImgPdf").show();
                        swal({
                            title: "Contrato",
                            text: "¡Formulario Actualizado!",
                            type: "success",
                            confirmButtonText: "¡Cerrar!"
                        });



                    }else if(respuesta.num === 1){

                        swal({
                            title: "Error al subir el archivo",
                            text: respuesta.msg ,
                            type: "error",
                            confirmButtonText: "¡Cerrar!"
                        });
                    }


                }

            });



        }else{
            swal({
                title: "Campo requerido",
                text: "¡Debe subir un archivo!",
                type: "error",
                confirmButtonText: "¡Cerrar!"
            });

        }
    });

});



$("#guardarTarCont").click(function () {
    for (var instanceName in CKEDITOR.instances) {
        CKEDITOR.instances[instanceName].updateElement();
    }
    var datos = new FormData();
    var estado = $('input[name=Active]:checked').val();
    var tarifarioDesc = $("#tarifarioDesc").val();

    console.log(estado);
    console.log(tarifarioDesc);

    datos.append("estado", estado);
    datos.append("tarifarioDesc", tarifarioDesc);

    $.ajax({

        url: "ajax/tarCont.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {


            if (respuesta.num === 0) {
                swal({
                    title: "Cambios guardados",
                    text: "¡Tarifario Actualizado!",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                });

            } else if (respuesta.num === 1) {

                swal({
                    title: "Error al guardar la data",
                    text: respuesta.msg,
                    type: "error",
                    confirmButtonText: "¡Cerrar!"
                });
            }


        }

    });


});


$("#guardarEstadoContrato").click(function () {
    for (var instanceName in CKEDITOR.instances) {
        CKEDITOR.instances[instanceName].updateElement();
    }
    var datos = new FormData();
    var estadoContrato = $('input[name=ActiveContrato]:checked').val();

    datos.append("estadoContrato", estadoContrato);
    $.ajax({

        url: "ajax/tarCont.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {


            if (respuesta.num === 0) {
                swal({
                    title: "Cambios guardados",
                    text: "¡Tarifario Actualizado!",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                });

            } else if (respuesta.num === 1) {

                swal({
                    title: "Error al guardar la data",
                    text: respuesta.msg,
                    type: "error",
                    confirmButtonText: "¡Cerrar!"
                });
            }


        }

    });


});



$("#subirPdf").change(function(){
   var filePDF = this.files[0];
   console.log(filePDF);

   if (filePDF["type"]!="application/pdf"){
       $("#subirPdf").val("");

       swal({
           title: "Error al subir el archivo",
           text: "¡Solamente se aceptan formato PDF!",
           type: "error",
           confirmButtonText: "¡Cerrar!"
       });

   }
   else if(filePDF["size"] > 2000000){

       $("#subirPdf").val("");

       swal({
           title: "Error al subir el archivo",
           text: "¡El archivo no puede pesar mas de 2MB!",
           type: "error",
           confirmButtonText: "¡Cerrar!"
       });

       /*=============================================
        PREVISUALIZAMOS LA IMAGEN
        =============================================*/

   }


});

$("#guardarEstadoEEFF").click(function () {
    for (var instanceName in CKEDITOR.instances) {
        CKEDITOR.instances[instanceName].updateElement();
    }
    var datos = new FormData();
    var estadoEEFF = $('input[name=ActiveEEFF]:checked').val();

    datos.append("estadoEEFF", estadoEEFF);
    $.ajax({

        url: "ajax/tarCont.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {


            if (respuesta.num === 0) {
                swal({
                    title: "Cambios guardados",
                    text: "¡Formulario Actualizado!",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                });

            } else if (respuesta.num === 1) {

                swal({
                    title: "Error al guardar la data",
                    text: respuesta.msg,
                    type: "error",
                    confirmButtonText: "¡Cerrar!"
                });
            }


        }

    });


});



$("#archivosEEFF").change(function(){
    var fileEEFF = this.files[0];
    console.log(fileEEFF);

    if (fileEEFF["type"]!="application/pdf"){
        $("#archivosEEFF").val("");

        swal({
            title: "Error al subir el archivo",
            text: "¡Solamente se aceptan formato PDF!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    }
    else if(fileEEFF["size"] > 2000000){

        $("#archivosEEFF").val("");

        swal({
            title: "Error al subir el archivo",
            text: "¡El archivo no puede pesar mas de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });


    }else {

        $("#archivosEEFF").after('<div class="msgArcEEFF alert alert-success fade in">Archivo Cargado</div>');
    }


    $("#guardarEEFF").click(function(){

        if ($("#archivosEEFF").val()!=''){

            var datos = new FormData();

            datos.append("uploadEEFF",fileEEFF);
            $.ajax({
                url:"ajax/tarCont.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta){

                    if(respuesta.num === 0){

                        $('.msgArcEEFF ').css('display','none');
                        $("#archivosEEFF").val("");
                       // $(".previsualizarImgPdf").show();
                        swal({
                            title: "EEFF",
                            text: "¡Formulario Actualizado!",
                            type: "success",
                            confirmButtonText: "¡Cerrar!"
                        });


                        $('#user_dataEEFF').DataTable().ajax.reload();

                    }else if(respuesta.num === 1){

                        swal({
                            title: "Error al subir el archivo",
                            text: respuesta.msg ,
                            type: "error",
                            confirmButtonText: "¡Cerrar!"
                        });
                    }


                }

            });



        }else{
            swal({
                title: "Campo requerido",
                text: "¡Debe subir un archivo!",
                type: "error",
                confirmButtonText: "¡Cerrar!"
            });

        }
    });


});


$(document).on('click', '.delete', function(){
    var idFile= $(this).attr("id");
    var tagName = $(this).attr("tag");
    if(confirm("Esta seguro de borrar el registro?"))
    {
        $.ajax({
            url:"ajax/tarCont.ajax.php",
            method:"POST",
            data:{"operation":"Del","idFile":idFile,"tagName":tagName},
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

function loadCKEbasic(id) {
    var instance = CKEDITOR.instances[id];
    if (instance) {
        CKEDITOR.remove(instance);
    }

    CKEDITOR.on('instanceReady', function () {
        $(".cke_button__source_label").text("View Source");

    });


    CKEDITOR.on('dialogDefinition', function (e) {

        console.log('Ready');
        var dialogName = e.data.name;
        var dialogDefinition = e.data.definition;


        if (dialogName == 'image') {

            dialogDefinition.removeContents('Link');
            dialogDefinition.removeContents('advanced');

            dialogDefinition.dialog.resize(600, 200);

            var infoTab = dialogDefinition.getContents('info');
            var altField = infoTab.get('txtUrl');
            var altFieldBrowser = infoTab.get('browse');

            infoTab.remove('txtBorder');
            infoTab.remove('txtHSpace');
            infoTab.remove('txtVSpace');
            infoTab.remove('previewImage');
            infoTab.remove('alternativeText');
            infoTab.remove('txtAlt');


            altField.label = 'Link <span class="form-required" title="This field is required.">*</span>';


            altFieldBrowser.label = 'Upload image';


        }


    });

    CKEDITOR.replace(id,
        {
            toolbar: [
                {name: 'document', items: ['NewPage', '-', 'Source']},
                ['Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo'],
                ['Font', 'FontSize', 'TextColor'],
                '/',
                ['Bold', 'Italic', 'Underline'],
                {
                    name: 'paragraph',
                    groups: ['list', 'indent', 'blocks', 'align', 'bidi'],
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
                },
                {name: 'styles', items: ['Format']},
                {name: 'insert', items: ['Image', 'HorizontalRule', 'Table']},
                {name: 'tools', items: ['Maximize', 'Link', 'Unlink']}


            ]
        });


    CKEDITOR.config.fontSize_sizes = '8/8px;9/9px;10/10px;11/11px;12/12px;14/14px;16/16px;18/18px;20/20px;22/22px';
    CKEDITOR.config.baseFloatZIndex = 9000;


    CKEDITOR.config.filebrowserBrowseUrl = './vistas/plugins/kcfinder-3.12/browse.php?opener=ckeditor&type=files';
    CKEDITOR.config.filebrowserImageBrowseUrl = './vistas/plugins/kcfinder-3.12/browse.php?opener=ckeditor&type=images';
    CKEDITOR.config.filebrowserFlashBrowseUrl = './vistas/plugins/kcfinder-3.12/browse.php?opener=ckeditor&type=flash';
    CKEDITOR.config.filebrowserUploadUrl = './vistas/plugins/kcfinder-3.12/upload.php?opener=ckeditor&type=files';
    CKEDITOR.config.filebrowserImageUploadUrl = './vistas/plugins/kcfinder-3.12/upload.php?opener=ckeditor&type=images';
    CKEDITOR.config.filebrowserFlashUploadUrl = './vistas/plugins/kcfinder-3.12/upload.php?opener=ckeditor&type=flash';

    CKEDITOR.config.removeDialogTabs = 'image:Upload;image:Link;image:advanced';


}




