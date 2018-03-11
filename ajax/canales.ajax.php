<?php
require_once "../controladores/canales.controlador.php";
require_once "../modelos/canales.modelo.php";

class AjaxCanales
{


    public $imgCanales;


    public function ajaxCambiarimgCanales()
    {
        $item = "imgFondo";
        $valor = $this->imgCanales;
        $respuesta = ControladorCanales::ctrActualizarImgCanales($item, $valor);
        echo json_encode($respuesta);

    }


    public $titulo;
    public $descripcion;

    public function ajaxCambiarFormulario()
    {

        $datos = array("titulo" => $this->titulo, "descripcion" => $this->descripcion);


        $respuesta = ControladorCanales::ctrActualizarForm($datos);
        echo json_encode($respuesta);


    }

    public $bannerTitulo;
    public $bannerDesc;

    public function ajaxCambiarDataBanner()
    {

        $datos = array("bannerTitulo" => $this->bannerTitulo, "bannerDesc" => $this->bannerDesc);
        $respuesta = ControladorCanales::ctrActualizarBannerForm($datos);
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


        $classObj = new ControladorCanales();
        $response = $classObj->queryDataTableController($dataPost);
        echo $response;
    }

    public $sucursal;
    public $latitud;
    public $longitud;

    public function ajaxAgregarDireccion()
    {
        $data = array("sucursal" => $this->sucursal, "latitud" => $this->latitud, "longitud" => $this->longitud);
        $respuesta = ControladorCanales::ctrAgregarDireccion($data);
        echo json_encode($respuesta);

    }

    public $marketId;

    public function ajaxGetSingleData()
    {
        $classObj = new ControladorCanales();

        $response = $classObj->ctrGetDataMarket($this->marketId);
        echo $response;

    }


    public function ajaxActualizarSingleData()
    {

        $data = array("id" => $this->marketId,
            "nombre" => $this->sucursal,
            "latitud" => $this->latitud,
            "longitud" => $this->longitud
        );

        $respuesta = ControladorCanales::ctrActualizarSingleData($data);
        echo json_encode($respuesta);
    }

    public function ajaxBorrarDireccion()
    {
        $respuesta = ControladorCanales::ctrBorrarDireccion($this->marketId);
        echo json_encode($respuesta);
    }


}


if (isset($_FILES["imgCanales"])) {
    $objCanales = new AjaxCanales();
    $objCanales->imgCanales = $_FILES["imgCanales"];
    $objCanales->ajaxCambiarimgCanales();


}

if (isset($_POST["titulo"])) {
    $formulario = new AjaxCanales();
    $formulario->titulo = $_POST["titulo"];
    $formulario->descripcion = $_POST["descripcion"];
    $formulario->ajaxCambiarFormulario();

}

if (isset($_POST["bannerTitulo"])) {
    $objDataBanner = new AjaxCanales();
    $objDataBanner->bannerTitulo = $_POST["bannerTitulo"];
    $objDataBanner->bannerDesc = $_POST["bannerDesc"];
    $objDataBanner->ajaxCambiarDataBanner();

}


if (isset($_POST["draw"])) {
    $c = new AjaxCanales();
    $c->draw = $_POST["draw"];
    $c->getDataTable();
}

//print_r($_POST);
if (isset($_POST["market_id"])) {
    $objData = new AjaxCanales();
    $objData->marketId = $_POST["market_id"];
    $objData->ajaxGetSingleData();

}


if (isset($_POST["operation"]) && ($_POST["operation"] == "Add")) {

    $objAdd = new AjaxCanales();
    $objAdd->sucursal = $_POST["sucursal"];
    $objAdd->latitud = $_POST["latitud"];
    $objAdd->longitud = $_POST["longitud"];
    $objAdd->ajaxAgregarDireccion();

}


if (isset($_POST["operation"]) && ($_POST["operation"] == "Edit")) {

    $objEdit = new AjaxCanales();
    $objEdit->marketId = $_POST["market_id"];
    $objEdit->sucursal = $_POST["sucursal"];
    $objEdit->latitud = $_POST["latitud"];
    $objEdit->longitud = $_POST["longitud"];
    $objEdit->ajaxActualizarSingleData();

}

if (isset($_POST["operation"]) && ($_POST["operation"] === "Del")) {


    $objDel = new AjaxCanales();
    $objDel->marketId = $_POST["market_id"];
    $objDel->ajaxBorrarDireccion();

}