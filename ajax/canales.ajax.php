<?php
require_once "../controladores/canales.controlador.php";
require_once "../modelos/canales.modelo.php";

class AjaxCanales{


    public $imgCanales;


    public function ajaxCambiarimgCanales(){
        $item = "imgFondo";
        $valor = $this->imgCanales;
        $respuesta = ControladorCanales::ctrActualizarImgCanales($item , $valor);
        echo json_encode($respuesta);

    }


    public $titulo;
    public $descripcion;
    public function ajaxCambiarFormulario(){

        $datos = array("titulo"=>$this->titulo,"descripcion"=>$this->descripcion);



        $respuesta = ControladorCanales::ctrActualizarForm($datos);
        echo json_encode($respuesta);


    }

    public $bannerTitulo;
    public $bannerDesc;
    public function ajaxCambiarDataBanner(){

        $datos = array("bannerTitulo"=>$this->bannerTitulo,"bannerDesc"=>$this->bannerDesc);
        $respuesta = ControladorCanales::ctrActualizarBannerForm($datos);
        echo json_encode($respuesta);
    }



}

if (isset($_FILES["imgCanales"])){
    $objCanales = new AjaxCanales();
    $objCanales->imgCanales = $_FILES["imgCanales"];
    $objCanales -> ajaxCambiarimgCanales();



}

if (isset($_POST["titulo"])){
    $formulario = new AjaxCanales();
    $formulario->titulo = $_POST["titulo"];
    $formulario->descripcion = $_POST["descripcion"];
    $formulario->ajaxCambiarFormulario();

}

if (isset($_POST["bannerTitulo"])){
    $objDataBanner = new AjaxCanales();
    $objDataBanner->bannerTitulo = $_POST["bannerTitulo"];
    $objDataBanner->bannerDesc = $_POST["bannerDesc"];
    $objDataBanner->ajaxCambiarDataBanner();

}

