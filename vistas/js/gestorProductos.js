/**
 * Created by Administrador on 2/14/2018.
 */


loadCKEbasic("turbo");
loadCKEbasic("empresarial");
loadCKEbasic("microcredito");
loadCKEbasic("microturbo");
loadCKEbasic("activoProductivo");

$("#subirImgProducto").change(function(){

    var img = this.files[0];


    if(img["type"] != "image/jpeg" && img["type"] != "image/png"){

        $("#subirImgProducto").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });



    }
    else if(img["size"] > 2000000){

        $("#subirImgProducto").val("");

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

            $(".previsualizarImgProducto").attr("src", rutaImagen);

        })

    }

    $("#guardarImgProducto").click( function (){
        var datos = new FormData();
        datos.append("imgProducto",img);

        $.ajax({

            url:"ajax/productos.ajax.php",
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

