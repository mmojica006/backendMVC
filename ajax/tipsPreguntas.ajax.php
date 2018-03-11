<?php
require_once "../controladores/tipPreguntas.controlador.php";
require_once "../modelos/tipPreguntas.modelo.php";

class  AjaxTipsPreguntas{

    public $tipsFinancieros;
    public function  ajaxActualizarTips(){

        $respuesta = ControladorTipPreguntas::ctrActualizarTips($this->tipsFinancieros);
        echo json_encode($respuesta);
    }

    public $preguntas;
    public function  ajaxPreguntas(){

        $respuesta = ControladorTipPreguntas::ctrActualizarPreguntas($this->preguntas);
        echo json_encode($respuesta);
    }





}

if (isset($_POST["tips"])){

    $objTips = new AjaxTipsPreguntas();
    $objTips->tipsFinancieros=$_POST["tips"];
    $objTips->ajaxActualizarTips();
}

if (isset($_POST["preguntas"])){

    $obj = new AjaxTipsPreguntas();
    $obj->preguntas=$_POST["preguntas"];
    $obj->ajaxPreguntas();
}