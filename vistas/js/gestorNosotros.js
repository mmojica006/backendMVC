/**
 * Created by Mosses on 13/02/2018.
 */
loadCKEbasic("mision");
loadCKEbasic("vision");
loadCKEbasic("valores");


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
    var descripcion = $("#descripcion").val();



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