loadCKEbasic("tarifarioDesc");


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

        $(".previsualizarImgPdf").after('<div class="alert alert-success">Imagen Cargada</div>');



    }

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
                    title: "Error al subir la imagen",
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



