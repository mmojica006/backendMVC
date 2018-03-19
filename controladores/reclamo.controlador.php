<?php

class ControladorReclamo{

    public function ctrSeleccionarReclamo(){
        $tabla = "tbl_reclamo_info";
        $respuesta = ModeloReclamo::mdlSeleccionarReclamo($tabla);
        return 	$respuesta;


    }




    static public function ctrActualizarForm($datos){
        $tabla = "tbl_reclamo_info";
        $id=1;
        $respuesta = ModeloReclamo::mdlActualizarForm($tabla,$id,$datos);


        return $respuesta;
    }

    static public function ctrActualizarBannerForm($datos){
        $tabla = "tbl_reclamo_info";
        $id=1;
        $respuesta = ModeloReclamo::mdlActualizarBannerForm($tabla,$id,$datos);


        return $respuesta;
    }


}
