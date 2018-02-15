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


}

if (isset($_FILES["imgProducto"])){
    $obj= new AjaxProductos();
    $obj->imgProducto = $_FILES["imgProducto"];
    $obj -> ajaxCambiarimgProducto();
}

if (isset($_POST["titulo"])){
    $obj2 = new AjaxContacto();
    $obj2->titulo = $_POST["titulo"];
    $obj2->descripcion = $_POST["descripcion"];
    $obj2->ajaxCambiarFormulario();

}