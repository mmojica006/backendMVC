<?php
class ControladorProductos{

    public function ctrSeleccionarProductos(){
        $tabla = "tbl_productos";
        $respuesta = ModeloProductos::mdlSeleccionarProductos($tabla);
        return 	$respuesta;
    }

    static public function ctrActualizarImgProducto($item,$valor){

        $tabla = "tbl_productos";
        $id=1;

        $contacto = ModeloProductos::mdlSeleccionarProductos($tabla);


        if (isset($valor["tmp_name"])){

            list($ancho, $alto) = getimagesize($valor["tmp_name"]);

            $nuevoAncho = 1200;
            $nuevoAlto = 625;
            $respuesta =[];

            if (($ancho==$nuevoAncho)&&($alto==$nuevoAlto )){

                if (file_exists(' ../'.$contacto["imgFondo"] )){
                    unlink("../".$contacto["imgFondo"]);
                }


                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                if($valor["type"] == "image/jpeg"){

                    $ruta = "../vistas/img/plantilla/imgProductos.jpg";

                    $origen = imagecreatefromjpeg($valor["tmp_name"]);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);

                }

                if($valor["type"] == "image/png"){

                    $ruta = "../vistas/img/plantilla/imgProductos.png";

                    $origen = imagecreatefrompng($valor["tmp_name"]);

                    imagealphablending($destino, FALSE);

                    imagesavealpha($destino, TRUE);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);

                }

                $valorNuevo = substr($ruta, 3);

                $respuesta = ModeloProductos::mdlActualizarImgFondo($tabla, $id, $item, $valorNuevo);

            }else{
                $respuesta["num"]=1;
                $respuesta["msg"]="Dimensiones Incorrectas";
            }

            return $respuesta;

        }

    }

    static public function ctrActualizarBannerForm($datos){
        $tabla = "tbl_productos";
        $id=1;
        $respuesta = ModeloProductos::mdlActualizarBannerForm($tabla,$id,$datos);
        return $respuesta;
    }

    static public function ctrActualizarCrediPyme($texto){
        $tabla = "tbl_productos";
        $id=1;
        $respuesta = ModeloProductos::mdlActualizarCrediPyme($tabla,$id,$texto);
        return $respuesta;
    }

    static public function ctrActualizarCrediNegocio($texto){
        $tabla = "tbl_productos";
        $id=1;
        $respuesta = ModeloProductos::mdlActualizarCrediNegocio($tabla,$id,$texto);
        return $respuesta;
    }

    static public function ctrActualizarProductivo($texto){
        $tabla = "tbl_productos";
        $id=1;
        $respuesta = ModeloProductos::mdlActualizarProductivo($tabla,$id,$texto);
        return $respuesta;
    }

    static public function ctrActualizarMicroTurbo($texto){
        $tabla = "tbl_productos";
        $id=1;
        $respuesta = ModeloProductos::mdlActualizarMicroturbo($tabla,$id,$texto);
        return $respuesta;
    }

    static public function ctrActualizarTurbo($texto){
        $tabla = "tbl_productos";
        $id=1;
        $respuesta = ModeloProductos::mdlActualizarTurbo($tabla,$id,$texto);
        return $respuesta;
    }

    static public function ctrActualizarMegaTurbo($texto){
        $tabla = "tbl_productos";
        $id=1;
        $respuesta = ModeloProductos::mdlActualizarMegaTurbo($tabla,$id,$texto);
        return $respuesta;
    }


}
