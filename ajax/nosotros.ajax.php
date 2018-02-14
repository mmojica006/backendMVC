<?php
/**
 * Created by PhpStorm.
 * User: Mosses
 * Date: 13/02/2018
 * Time: 22:46
 */


require_once "../controladores/nosotros.controlador.php";
require_once "../modelos/nosotros.modelo.php";

class AjaxNosotros
{

    public $imgNosotros;

    public function ajaxCambiarImgNosotros()
    {
        $item = "imgFondo";
        $valor = $this->imgNosotros;
        $respuesta = ControladorNosotros::ctrActualizarImgNosotros($item, $valor);
        echo json_encode($respuesta);

    }
    public $bannerTitulo;
    public $bannerDesc;
    public function ajaxCambiarDataBanner(){

        $datos = array("bannerTitulo"=>$this->bannerTitulo,"bannerDesc"=>$this->bannerDesc);
        $respuesta = ControladorNosotros::ctrActualizarBannerForm($datos);
        echo json_encode($respuesta);
    }

    public $titulo;
    public $descripcion;
    public function ajaxCambiarInfoInfo1(){

        $datos = array("titulo"=>$this->titulo,"descripcion"=>$this->descripcion);

        $respuesta = ControladorNosotros::ctrActualizarInfo1($datos);
        echo json_encode($respuesta);


    }


}


if (isset($_FILES["imgNosotros"])) {
    $obj = new AjaxNosotros();
    $obj->imgNosotros = $_FILES["imgNosotros"];
    $obj->ajaxCambiarImgNosotros();


}

if (isset($_POST["bannerTitulo"])){
    $objDataBanner = new AjaxNosotros();
    $objDataBanner->bannerTitulo = $_POST["bannerTitulo"];
    $objDataBanner->bannerDesc = $_POST["bannerDesc"];
    $objDataBanner->ajaxCambiarDataBanner();

}

if (isset($_POST["titulo"])){
    $objInfo1 = new AjaxNosotros();
    $objInfo1->titulo = $_POST["titulo"];
    $objInfo1->descripcion = $_POST["descripcion"];
    $objInfo1->ajaxCambiarInfoInfo1();

}

