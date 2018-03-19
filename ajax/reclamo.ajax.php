<?php
require_once "../controladores/reclamo.controlador.php";
require_once "../modelos/reclamo.modelo.php";

class AjaxReclamo{




    public $titulo;
    public $descripcion;
    public function ajaxCambiarFormulario(){

        $datos = array("titulo"=>$this->titulo,"descripcion"=>$this->descripcion);



        $respuesta = ControladorReclamo::ctrActualizarForm($datos);
        echo json_encode($respuesta);


    }

    public $bannerTitulo;
    public $bannerDesc;
    public function ajaxCambiarDataBanner(){

        $datos = array("bannerTitulo"=>$this->bannerTitulo,"bannerDesc"=>$this->bannerDesc);
        $respuesta = ControladorReclamo::ctrActualizarBannerForm($datos);
        echo json_encode($respuesta);
    }



}

if (isset($_POST["titulo"])){
    $formulario = new AjaxReclamo();
    $formulario->titulo = $_POST["titulo"];
    $formulario->descripcion = $_POST["descripcion"];
    $formulario->ajaxCambiarFormulario();

}

if (isset($_POST["bannerTitulo"])){
    $objDataBanner = new AjaxReclamo();
    $objDataBanner->bannerTitulo = $_POST["bannerTitulo"];
    $objDataBanner->bannerDesc = $_POST["bannerDesc"];
    $objDataBanner->ajaxCambiarDataBanner();

}

