<?php


require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";
class AjaxProductos{

    public $imgProducto;


    public function ajaxCambiarimgProducto(){
        $item = "imgFondo";
        $valor = $this->imgProducto;
        $respuesta = ControladorProductos::ctrActualizarImgProducto($item , $valor);
        echo json_encode($respuesta);

    }
    public $titulo;
    public $descripcion;
    public function ajaxCambiarFormulario(){

        $datos = array("titulo"=>$this->titulo,"descripcion"=>$this->descripcion);


        $respuesta = ControladorProductos::ctrActualizarForm($datos);
        echo json_encode($respuesta);


    }

    public $bannerTitulo;
    public $bannerDesc;
    public function ajaxCambiarDataBanner(){

        $datos = array("bannerTitulo"=>$this->bannerTitulo,"bannerDesc"=>$this->bannerDesc);
        $respuesta = ControladorProductos::ctrActualizarBannerForm($datos);
        echo json_encode($respuesta);
    }

    public $capitalTrabajo;
    public function ajaxCambiarCapitalTrabajo(){
        $respuesta = ControladorProductos::ctrActualizarCapitalTrabajo($this->capitalTrabajo);
        echo json_encode($respuesta);
    }



    public $activoProductivo;
    public function ajaxCambiarProductivo(){
        $respuesta = ControladorProductos::ctrActualizarProductivo($this->activoProductivo);
        echo json_encode($respuesta);
    }

    public $microTurbo;
    public function ajaxCambiarMicroTurbo(){
        $respuesta = ControladorProductos::ctrActualizarMicroTurbo($this->microTurbo);
        echo json_encode($respuesta);
    }

    public $turbo;
    public function ajaxCambiarTurbo(){
        $respuesta = ControladorProductos::ctrActualizarTurbo($this->turbo);
        echo json_encode($respuesta);
    }

    public $megaTurbo;
    public function ajaxCambiarMegaTurbo(){
        $respuesta = ControladorProductos::ctrActualizarMegaTurbo($this->megaTurbo);
        echo json_encode($respuesta);
    }




}

if (isset($_FILES["imgProducto"])){
    $obj= new AjaxProductos();
    $obj->imgProducto = $_FILES["imgProducto"];
    $obj -> ajaxCambiarimgProducto();
}

if (isset($_POST["titulo"])){
    $obj2 = new AjaxProductos();
    $obj2->titulo = $_POST["titulo"];
    $obj2->descripcion = $_POST["descripcion"];
    $obj2->ajaxCambiarFormulario();

}

if (isset($_POST["bannerTitulo"])){
    $objDataBanner = new AjaxProductos();
    $objDataBanner->bannerTitulo = $_POST["bannerTitulo"];
    $objDataBanner->bannerDesc = $_POST["bannerDesc"];
    $objDataBanner->ajaxCambiarDataBanner();

}

if (isset($_POST["capitalTrabajo"])){
    $obj3= new AjaxProductos();
    $obj3->capitalTrabajo = $_POST["capitalTrabajo"];
    $obj3->ajaxCambiarCapitalTrabajo();

}


if (isset($_POST["activoProductivo"])){
    $obj3= new AjaxProductos();
    $obj3->activoProductivo = $_POST["activoProductivo"];
    $obj3->ajaxCambiarProductivo();

}

if (isset($_POST["microTurbo"])){
    $obj4= new AjaxProductos();
    $obj4->microTurbo = $_POST["microTurbo"];
    $obj4->ajaxCambiarMicroTurbo();

}

if (isset($_POST["turbo"])){
    $obj4= new AjaxProductos();
    $obj4->turbo = $_POST["turbo"];
    $obj4->ajaxCambiarTurbo();

}

if (isset($_POST["activoMegaTurbo"])){
    $obj4= new AjaxProductos();
    $obj4->megaTurbo = $_POST["activoMegaTurbo"];
    $obj4->ajaxCambiarMegaTurbo();

}