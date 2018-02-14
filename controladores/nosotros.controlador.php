<?php

class ControladorNosotros{

    public function ctrSeleccionarNosotros(){
        $tabla= "tbl_nosotros";
        $respuesta = ModeloNosotros::mdlSeleccionarNosotros($tabla);
        return $respuesta;

    }
    static public function ctrActualizarImgNosotros($item,$valor){
        $tabla = "tbl_nosotros";
        $id=1;

        $dataNosotros = ModeloNosotros::mdlSeleccionarNosotros($tabla);


        if (isset($valor["tmp_name"])){

            list($ancho, $alto) = getimagesize($valor["tmp_name"]);

            $nuevoAncho = 1200;
            $nuevoAlto = 625;
            $respuesta =[];

            if (($ancho==$nuevoAncho)&&($alto==$nuevoAlto )){

                if (file_exists(' ../'.$dataNosotros["imgFondo"] )){
                    unlink("../".$dataNosotros["imgFondo"]);
                }


                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                if($valor["type"] == "image/jpeg"){

                    $ruta = "../vistas/img/plantilla/imgNosotros.jpg";

                    $origen = imagecreatefromjpeg($valor["tmp_name"]);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);

                }

                if($valor["type"] == "image/png"){

                    $ruta = "../vistas/img/plantilla/imgNosotros.png";

                    $origen = imagecreatefrompng($valor["tmp_name"]);

                    imagealphablending($destino, FALSE);

                    imagesavealpha($destino, TRUE);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);

                }

                $valorNuevo = substr($ruta, 3);

                $respuesta = ModeloNosotros::mdlActualizarImgNosotros($tabla, $id, $item, $valorNuevo);




            }else{
                $respuesta["num"]=1;
                $respuesta["msg"]="Dimensiones Incorrectas";



            }

            return $respuesta;





        }
    }



}