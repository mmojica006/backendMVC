<?php
class ControladorTipPreguntas
{

    public function ctrSeleccionarTipPreguntas()
    {
        $tabla = "tbl_adicional";
        $respuesta = ModeloTipsPreguntas::mdlSeleccionarTipPreguntas($tabla);
        return $respuesta;
    }

    public function ctrActualizarTips($data){
        $tabla ="tbl_adicional";
        $id='';
        $objClass = new ControladorTipPreguntas();

        $countTable = $objClass->ctrSeleccionarTipPreguntas();
        if (!empty($countTable))
            $id=1;

        $respuesta = ModeloTipsPreguntas::mdlActualizartipos($tabla,$id,$data);
        return $respuesta;

    }

    public function ctrActualizarPreguntas($data){
        $tabla ="tbl_adicional";
        $id='';
        $objClass = new ControladorTipPreguntas();

        $countTable = $objClass->ctrSeleccionarTipPreguntas();
        if (!empty($countTable))
        $id=1;


        $respuesta = ModeloTipsPreguntas::mdlActualizarPreguntas($tabla,$id,$data);
        return $respuesta;

    }

}