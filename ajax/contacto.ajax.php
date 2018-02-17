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


	public $titulo;
	public $descripcion;
	public function ajaxCambiarFormulario(){

		$datos = array("titulo"=>$this->titulo,"descripcion"=>$this->descripcion);


		$respuesta = ControladorContacto::ctrActualizarForm($datos);
		echo json_encode($respuesta);


	}

	public $bannerTitulo;
	public $bannerDesc;
	public function ajaxCambiarDataBanner(){

		$datos = array("bannerTitulo"=>$this->bannerTitulo,"bannerDesc"=>$this->bannerDesc);
		$respuesta = ControladorContacto::ctrActualizarBannerForm($datos);
		echo json_encode($respuesta);
	}



}

if (isset($_FILES["imgContacto"])){
	$objContacto = new AjaxContacto();
	$objContacto->imgContacto = $_FILES["imgContacto"];
	$objContacto -> ajaxCambiarimgContacto();



}

if (isset($_POST["titulo"])){
	$formulario = new AjaxContacto();
	$formulario->titulo = $_POST["titulo"];
	$formulario->descripcion = $_POST["descripcion"];
	$formulario->ajaxCambiarFormulario();

}

if (isset($_POST["bannerTitulo"])){
	$objDataBanner = new AjaxContacto();
	$objDataBanner->bannerTitulo = $_POST["bannerTitulo"];
	$objDataBanner->bannerDesc = $_POST["bannerDesc"];
	$objDataBanner->ajaxCambiarDataBanner();

}

