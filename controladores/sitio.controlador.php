<?php

 class ControladorSitio{

 public static  function  ctrSeleccionarPlantilla(){
 		$tabla ="plantilla";
		$respuesta = ModeloSitio::mdlSeleccionarPlantilla($tabla);

		return $respuesta;


 	}

 public static  function ctrActualizarLogoIcono($item, $valor){

		$tabla = "plantilla";
		$id = 1;

		$plantilla = ModeloSitio::mdlSeleccionarPlantilla($tabla);

		/*=============================================
		CAMBIANDO LOGOTIPO O ICONO
		=============================================*/	

		$valorNuevo = $valor;

		if(isset($valor["tmp_name"])){

			list($ancho, $alto) = getimagesize($valor["tmp_name"]);

			/*=============================================
			CAMBIANDO LOGOTIPO
			=============================================*/	

			if($item == "logo"){

				unlink("../".$plantilla["logo"]);

				$nuevoAncho = 380;
				$nuevoAlto = 100;

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				if($valor["type"] == "image/jpeg"){

					$ruta = "../vistas/img/plantilla/logo.jpg";

					$origen = imagecreatefromjpeg($valor["tmp_name"]);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);

				}

				if($valor["type"] == "image/png"){

					$ruta = "../vistas/img/plantilla/logo.png";

					$origen = imagecreatefrompng($valor["tmp_name"]);

					imagealphablending($destino, FALSE);

					imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);

				}

			}

			/*=============================================
			CAMBIANDO ICONO
			=============================================*/	

			if($item == "icono"){

				unlink("../".$plantilla["icono"]);

				$nuevoAncho = 100;
				$nuevoAlto = 100;

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				if($valor["type"] == "image/jpeg"){

					$ruta = "../vistas/img/plantilla/icono.jpg";

					$origen = imagecreatefromjpeg($valor["tmp_name"]);					

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);
			
				}

				if($valor["type"] == "image/png"){

					$ruta = "../vistas/img/plantilla/icono.png";

					$origen = imagecreatefrompng($valor["tmp_name"]);

					imagealphablending($destino, FALSE);
        			
        			imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);
			
				}

			}

			$valorNuevo = substr($ruta, 3);

		}

		$respuesta = ModeloSitio::mdlActualizarLogoIcono($tabla, $id, $item, $valorNuevo);

		return $respuesta;

	}


 public static  function ctrActualizarColores($datos){

		$tabla = "plantilla";
		$id = 1;

		$respuesta = ModeloSitio::mdlActualizarColores($tabla, $id, $datos);

		return $respuesta;


	}

     public  static  function ctrActualizarScript($datos){

         $tabla = "plantilla";
         $id = 1;

         $respuesta = ModeloSitio::mdlActualizarScript($tabla, $id, $datos);

         return $respuesta;


     }

     public static  function ctrActualizarEmail($email){

         $tabla = "contacto";
         $id = 1;
         $respuesta = ModeloSitio::mdlActualizarEmail($tabla, $id, $email);
         return $respuesta;


     }



}