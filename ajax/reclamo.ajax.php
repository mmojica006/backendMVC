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


    public $draw;
    public function getDataTable()
    {
        $dataPost = array();
        if (isset($_POST["search"]["value"])) {
            $dataPost["search"] = $_POST["search"]["value"];
        }
        if (isset($_POST["order"])) {
            $dataPost["order"] = $_POST["order"];
        }
        if (isset($_POST["length"]) || ($_POST["length"] != -1)) {
            $dataPost["start"] = $_POST["start"];
            $dataPost["length"] = $_POST["length"];
        }

        $dataPost["draw"] = $this->draw;


        $classObj = new ControladorReclamo();
        $response = $classObj->queryDataTableController($dataPost);
        echo $response;
    }





}


if (isset($_POST["draw"])) {
    $c = new AjaxReclamo();
    $c->draw = $_POST["draw"];
    $c->getDataTable();
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

