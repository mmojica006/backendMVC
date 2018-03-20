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

    public function queryDataTableController($dataPost)
    {
        $objModel = new ModeloReclamo();
        $data = array();
        $result = $objModel->queryDTModel($dataPost);
       // print_r($result);

        $filtered_rows = sizeof($result);
        foreach ($result as $row) {


            $sub_array = array();
            //  $sub_array[] = $imageSmall;
            // $sub_array[] = $imageLarge;
            $sub_array[] = $row["Nombre"];
            $sub_array[] = $row["Cedula"];
            $sub_array[] = $row["Sucursal"];
            $sub_array[] = $row["Descripcion"];
            $sub_array[] = $row["fecha"];
            $sub_array[] = '<button type="button" name="update" id="' . $row["id"] . '" class="btn btn-warning btn-xs update">Editar</button>';
            $sub_array[] = '<button type="button" name="delete" id="' . $row["id"] . '" class="btn btn-danger btn-xs delete">Borrar</button>';
            $data[] = $sub_array;
        }

        $output = array(
            "draw" => intval($dataPost["draw"]),//intval($_POST["draw"]),
            "recordsTotal" => $filtered_rows,
            "recordsFiltered" => $objModel->get_total_all_records(),
            "data" => $data
        );

        echo json_encode($output);


    }



}
