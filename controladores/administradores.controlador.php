<?php


class   ControladorAdministradores{
    
    public function ctrIngresoAdministradores(){
        
        if (isset($_POST["ingEmail"])){

        			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

  						$encriptar = crypt($_POST["ingPassword"], '$2y$12$9XMk3whOd9SzIm1/xZaKDerO.86iPSfi6S9sd8KRmTQWwzTFC6CYe');

  				$tabla = "administradores";
				$item = "email";
				$valor = $_POST["ingEmail"];

					$respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);

                if($respuesta["email"] == $_POST["ingEmail"] && $respuesta["password"] == $encriptar){

					
                            $_SESSION["validarSesionBackend"] = "ok";
                            $_SESSION["id"] = $respuesta["id"];
                            $_SESSION["nombre"] = $respuesta["nombre"];
                            $_SESSION["foto"] = $respuesta["foto"];
                            $_SESSION["email"] = $respuesta["email"];
                            $_SESSION["password"] = $respuesta["password"];
                            $_SESSION["perfil"] = $respuesta["perfil"];

                            echo '<script>
        
                                window.location = "bienvenidos";
        
                            </script>';

				}else{

					echo '<br>
					<div class="alert alert-danger">Error al ingresar vuelva a intentarlo</div>';

				}

        			}else{
                        echo '<br>
					<div class="alert alert-danger">Error validando credenciales</div>';

                    }
            
            
            
            
        }


        
    }
    
    
}