<?php

class ControladorCanales{

    public function ctrSeleccionarCanales(){
        $tabla = "tbl_canales";
        $respuesta = ModeloCanales::mdlSeleccionarCanales($tabla);
        return 	$respuesta;


    }

    static public function ctrActualizarImgCanales($item,$valor){

        $tabla = "tbl_canales";
        $id=1;

        $canales = ModeloCanales::mdlSeleccionarCanales($tabla);


        if (isset($valor["tmp_name"])){

            list($ancho, $alto) = getimagesize($valor["tmp_name"]);

            $nuevoAncho = 1200;
            $nuevoAlto = 625;
            $respuesta =[];

            if (($ancho==$nuevoAncho)&&($alto==$nuevoAlto )){

                if (file_exists(' ../'.$canales["imgFondo"] )){
                    unlink("../".$canales["imgFondo"]);
                }


                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                if($valor["type"] == "image/jpeg"){

                    $ruta = "../vistas/img/plantilla/imgContacto.jpg";

                    $origen = imagecreatefromjpeg($valor["tmp_name"]);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);

                }

                if($valor["type"] == "image/png"){

                    $ruta = "../vistas/img/plantilla/imgContacto.png";

                    $origen = imagecreatefrompng($valor["tmp_name"]);

                    imagealphablending($destino, FALSE);

                    imagesavealpha($destino, TRUE);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);

                }

                $valorNuevo = substr($ruta, 3);

                $respuesta = ModeloCanales::mdlActualizarImgFondo($tabla, $id, $item, $valorNuevo);




            }else{
                $respuesta["num"]=1;
                $respuesta["msg"]="Dimensiones Incorrectas";



            }

            return $respuesta;





        }

    }

}