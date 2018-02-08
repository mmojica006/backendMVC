<?php
require_once "../controladores/contacto.controlador.php";
require_once "../modelos/contacto.modelo.php";

class AjaxContacto{


	public $imgContacto;

	public function ajaxCambiarimgContacto(){
		$item = "imgFondo";
		$valor = $this->imgContacto;
		$respuesta = ControladorContacto::ctrActualizarImgContacto($item , $valor);
		echo json_encode($respuesta);

	}


}


if (isset($_FILES["imgContacto"])){
	$objContacto = new AjaxContacto();
	$objContacto->imgContacto = $_FILES["imgContacto"];
	$objContacto -> ajaxCambiarimgContacto();



}

