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


}


if (isset($_FILES["imgNosotros"])) {
    $obj = new AjaxNosotros();
    $obj->imgNosotros = $_FILES["imgNosotros"];
    $obj->ajaxCambiarImgNosotros();


}

