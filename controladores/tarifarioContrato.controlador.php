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

    public static function ctrActualizarEstadoEEFF($datos){
        $id=1;
        $tabla = "tbl_adicional";

        $respuesta = ModeloTarifarioContrato::mdlActualizarEstadoEEFF($tabla,$id,$datos);
        return $respuesta;

    }

    public static function ctrActualizarFilePdf($item , $valor){
        $tabla = "tbl_adicional";
        $id=1;

        $objClass = new ControladorTarifarioContrato();



        if (isset($valor["tmp_name"])){
            //$file = rand(1000,100000)."-".$valor['name'];

            $target = "converted.jpg";


            $file = "contratoCE.pdf";
            $file_loc = $valor['tmp_name'];
            $file_size = $valor['size'];
            $file_type = $valor['type'];
            $folder="../vistas/files/pdfContrato/";
            $valorNuevo=$folder.$file;
            if (move_uploaded_file($file_loc,$valorNuevo)){
               // print_r('entra');


               // exec("convert \"{$valorNuevo}[0]\" -colorspace RGB -geometry 200 \"output.jpg\"");

                //exec($valorNuevo .'" -colorspace RGB -resize 800 "'.$target.'"', $output, $response);
                //echo $response ? "PDF converted to JPEG!!" : 'PDF to JPEG Conversion failed';
               // exec("convert $folder".$valor['tmp_name']);
            }


            $respuesta = ModeloTarifarioContrato::mdlActualizarFilePdf($tabla, $id, $item, $file);
            return $respuesta;


        }
    }

    public static function ctrActualizarFilePdfEEFF( $valor){
        $tabla = "tbl_upload";
        $response = [];
        $id=1;


        if (isset($valor["tmp_name"])){

            $file = rand(1000,100000)."-".$valor['name'];


            $target = "converted.jpg";


            //$file = "contratoCE.pdf";
            $file_loc = $valor['tmp_name'];
            $file_size = $valor['size'];
            $file_type = $valor['type'];
            $folder="../vistas/files/pdfFinancieros/";
            $valorNuevo=$folder.$file;

            if( $file_size <= 20971520 ){

            if (move_uploaded_file($file_loc, $valorNuevo)) {

                $respuesta = ModeloTarifarioContrato::mdlActualizarFilePdfEEFF($tabla, $file,$file_size,$file_type,$folder);
                return $respuesta;


            }else{
                $response["num"]=-1;
                $response["msg"]="El archivo es muy grande";

                return $response;
            }
        }





        }

    }

    public function queryDataTableController($dataPost)
    {
        $objModel = new ModeloTarifarioContrato();
        $data = array();
        $result = $objModel->queryDTModel($dataPost);

        $filtered_rows = sizeof($result);
        foreach ($result as $row) {


            $sub_array = array();
            //  $sub_array[] = $imageSmall;
            // $sub_array[] = $imageLarge;
            $sub_array[] = $row["id"];
            $sub_array[] = $row["name"];
            $sub_array[] = '<button type="button" name="delete" tag="'.$row["name"].'" id="' . $row["id"] . '" class="btn btn-danger btn-xs delete">Borrar</button>';
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

    function genPdfThumbnail($source, $target)
    {
        //$source = realpath($source);
        $target = dirname($source).DIRECTORY_SEPARATOR.$target;
        $im     = new Imagick($source."[0]"); // 0-first page, 1-second page
        $im->setImageColorspace(255); // prevent image colors from inverting
        $im->setimageformat("jpeg");
        $im->thumbnailimage(160, 120); // width and height
        $im->writeimage($target);
        $im->clear();
        $im->destroy();
    }

    public function ctrBorrarFile($id,$fileName)
    {

        $tabla = "tbl_upload";

        $respuesta = ModeloTarifarioContrato::mdlBorrarFile($id, $tabla);
        if (file_exists("../vistas/files/pdfFinancieros/".$fileName )){
            unlink("../vistas/files/pdfFinancieros/".$fileName);
        }





        return $respuesta;
    }


}