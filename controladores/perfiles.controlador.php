<?php

class ControladorPerfiles{

    public function queryDataTableController($dataPost)
    {
        $objModel = new ModeloPerfiles();
        $data = array();
        $result = $objModel->queryDTModel($dataPost);

        $filtered_rows = sizeof($result);
        foreach ($result as $row) {

            $imageSmall = '';
            if (($row["foto"] != '') || ($row["foto"] != '')) {
                $imageSmall =  $imageSmall = '<img src="vistas/img/usuarios/'.$row["foto"].'" class="img-thumbnail" width="50%" height="35" />';
            } else {

                $imageSmall =  $imageSmall = '<img src="vistas/img/usuarios/default/image-not-found.png" class="img-thumbnail" width="50%" height="35" />';
            }
            $sub_array = array();
            //  $sub_array[] = $imageSmall;
            // $sub_array[] = $imageLarge;
            $sub_array[] = $row["id"];
            $sub_array[] = $imageSmall;
            $sub_array[] = $row["nombre"];
            $sub_array[] = $row["email"];
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