<?php

class ControladorContacto{

  public function ctrSeleccionarContacto(){
	$tabla = "contacto";
	$respuesta = ModeloContacto::mdlSeleccionarContacto($tabla);
	return 	$respuesta;
	

}

static public function ctrActualizarImgContacto($item,$valor){

	$tabla = "contacto";
	$id=1;
	
	$contacto = ModeloContacto::mdlSeleccionarContacto($tabla);


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

				$respuesta = ModeloContacto::mdlActualizarImgFondo($tabla, $id, $item, $valorNuevo);




			}else{
				$respuesta["num"]=1;
				$respuesta["msg"]="Dimensiones Incorrectas";



			}

				return $respuesta;





	}

}


static public function ctrActualizarForm($datos){
	$tabla = "contacto";
	$id=1;
	$respuesta = ModeloContacto::mdlActualizarForm($tabla,$id,$datos);


	return $respuesta;
}

static public function ctrActualizarBannerForm($datos){
	$tabla = "contacto";
	$id=1;
	$respuesta = ModeloContacto::mdlActualizarBannerForm($tabla,$id,$datos);
	

	return $respuesta;
}


}
