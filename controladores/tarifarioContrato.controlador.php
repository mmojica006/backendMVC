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


    public static function ctrActualizarEstadoContrato($datos){
        $id=1;
        $tabla = "tbl_adicional";

        $respuesta = ModeloTarifarioContrato::mdlActualizarEstadoContrato($tabla,$id,$datos);
        return $respuesta;

    }
    public static function ctrActualizarFilePdf($item , $valor){
        $tabla = "tbl_adicional";
        $id=1;


        if (isset($valor["tmp_name"])){
            //$file = rand(1000,100000)."-".$valor['name'];
            $file = "contratoCE.pdf";
            $file_loc = $valor['tmp_name'];
            $file_size = $valor['size'];
            $file_type = $valor['type'];
            $folder="../vistas/files/";
            $valorNuevo=$folder.$file;
            move_uploaded_file($file_loc,$valorNuevo);

            $respuesta = ModeloTarifarioContrato::mdlActualizarFilePdf($tabla, $id, $item, $file);
            return $respuesta;


        }


    }
}