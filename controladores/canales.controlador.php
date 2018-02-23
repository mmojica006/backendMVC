<?php

class ControladorCanales
{

    public function ctrSeleccionarCanales()
    {
        $tabla = "tbl_canales";
        $respuesta = ModeloCanales::mdlSeleccionarCanales($tabla);
        return $respuesta;


    }

    static public function ctrActualizarImgCanales($item, $valor)
    {

        $tabla = "tbl_canales";
        $id = 1;

        $canales = ModeloCanales::mdlSeleccionarCanales($tabla);


        if (isset($valor["tmp_name"])) {

            list($ancho, $alto) = getimagesize($valor["tmp_name"]);

            $nuevoAncho = 1200;
            $nuevoAlto = 625;
            $respuesta = [];

            if (($ancho == $nuevoAncho) && ($alto == $nuevoAlto)) {

                if (file_exists(' ../' . $canales["imgFondo"])) {
                    unlink("../" . $canales["imgFondo"]);
                }


                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                if ($valor["type"] == "image/jpeg") {

                    $ruta = "../vistas/img/plantilla/imgContacto.jpg";

                    $origen = imagecreatefromjpeg($valor["tmp_name"]);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);

                }

                if ($valor["type"] == "image/png") {

                    $ruta = "../vistas/img/plantilla/imgContacto.png";

                    $origen = imagecreatefrompng($valor["tmp_name"]);

                    imagealphablending($destino, FALSE);

                    imagesavealpha($destino, TRUE);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);

                }

                $valorNuevo = substr($ruta, 3);

                $respuesta = ModeloCanales::mdlActualizarImgFondo($tabla, $id, $item, $valorNuevo);


            } else {
                $respuesta["num"] = 1;
                $respuesta["msg"] = "Dimensiones Incorrectas";


            }

            return $respuesta;


        }

    }

    public function ctrActualizarDireccion()
    {
        $obj1 = new ControladorCanales();

        $tabla = "markers";
        $respuesta = ModeloCanales::mdlSeleccionarDireccion($tabla);

        if (count($respuesta)) {
            $obj1->createXMLfile($respuesta);
        }

        return array("num" => 0, "msg" => "Ok");

    }

    public function ctrGetDataMarket($id)
    {

        $output = array();
        $tabla = "markers";

        $result = ModeloCanales::mdlGetSingleMarket($id,$tabla);

            $output["name"] = $result["name"];
            $output["lat"] = $result["lat"];
            $output["lng"] = $result["lng"];


        echo json_encode($output);
    }


    public function queryDataTableController($dataPost)
    {
        $objModel = new ModeloCanales();
        $data = array();
        $result = $objModel->queryDTModel($dataPost);

        $filtered_rows = sizeof($result);
        foreach ($result as $row) {
            $imageLarge = '';
            $imageSmall = '';
//            if (($row["image_name"] != '') || ($row["image"] != '')) {
//                $imageLarge = '<img src="/upload-nct/feed-images-nct/ads/' . $row["image_name"] . '" class="img-thumbnail" width="90%" height="35" />';
//                $imageSmall = '<img src="/upload-nct/feed-images-nct/ads/' . $row["image"] . '" class="img-thumbnail" width="90%" height="35" />';
//            } else {
//                $imageLarge = '';
//                $imageSmall = '';
//            }
            $sub_array = array();
            //  $sub_array[] = $imageSmall;
            // $sub_array[] = $imageLarge;
            $sub_array[] = $row["id"];
            $sub_array[] = $row["name"];
            $sub_array[] = $row["lat"];
            $sub_array[] = $row["lng"];
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

    public function ctrAgregarDireccion($data)
    {
        $objClass = new ControladorCanales();

        $tabla = "markers";
        $respuesta = ModeloCanales::mdlGuardarDireccion($data, $tabla);

        if ($respuesta["num"]==0){
            $tabla ="markers";
            $result = ModeloCanales::mdlSeleccionarDireccion($tabla);

            $objClass->createXMLfile($result);

        }

        return $respuesta;


    }

    public function ctrActualizarSingleData($data)
    {
        $objClass = new ControladorCanales();

        $tabla = "markers";
        $respuesta = ModeloCanales::mdlActualizarSingleData($data, $tabla);

        if ($respuesta["num"]==0){
            $tabla ="markers";
            $result = ModeloCanales::mdlSeleccionarDireccion($tabla);

            $objClass->createXMLfile($result);

        }


        return $respuesta;


    }

    public function ctrBorrarDireccion($id)
    {
        $objClass = new ControladorCanales();
        $tabla = "markers";
        $respuesta = ModeloCanales::mdlBorrarDireccion($id, $tabla);

        if ($respuesta["num"]==0){
            $tabla ="markers";
            $result = ModeloCanales::mdlSeleccionarDireccion($tabla);

            $objClass->createXMLfile($result);

        }

        return $respuesta;
    }


    public function createXMLfile($markersArray)
    {

        $filePath = '../vistas/files/markers.xml';
        $dom = new DOMDocument('1.0', 'utf-8');
        $root = $dom->createElement('markers');
        for ($i = 0; $i < count($markersArray); $i++) {

            $markerId = $markersArray[$i]['id'];
            $markerName = $markersArray[$i]['name'];
            $markerAddress = $markersArray[$i]['address'];
            $markerLat = $markersArray[$i]['lat'];
            $markerIng = $markersArray[$i]['lng'];
            $markerType = $markersArray[$i]['type'];

            $marker = $dom->createElement('marker');

            $marker->setAttribute('id', $markerId);
            $marker->setAttribute('name', $markerName);
            $marker->setAttribute('address', $markerAddress);
            $marker->setAttribute('lat', $markerLat);
            $marker->setAttribute('lng', $markerIng);
            $marker->setAttribute('type', $markerType);

            $root->appendChild($marker);

        }

        $respuesta = $dom->appendChild($root);


        $dom->save($filePath);

    }


}