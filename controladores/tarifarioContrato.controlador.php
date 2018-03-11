<?php

class  ControladorTarifarioContrato{

    public function ctrSeleccionarTarCont(){
        $tabla = "tbl_adicional";
        $respuesta = ModeloTarifarioContrato::mdlSeleccionarTarCont($tabla);
        return 	$respuesta;


    }

    public static function ctrActualizarTarifario($datos){
        $id='';
        $tabla = "tbl_adicional";


        $existe =  ModeloTarifarioContrato::mdlSeleccionarTarCont($tabla);

        if (!empty($existe))
        $id = 1;

        $respuesta = ModeloTarifarioContrato::mdlActualizarTarifario($tabla,$id,$datos);
        return $respuesta;

    }

}
