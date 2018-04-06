<?php
require_once "../controladores/tarifarioContrato.controlador.php";
require_once "../modelos/tarifarioContrato.modelo.php";

class AjaxTarCont
{

    public $estado;
    public $tarifarioDesc;

    public function ajaxActualizarTarifario()
    {

        $datos = array("estado" => $this->estado, "tarifarioDesc" => $this->tarifarioDesc);


        $response = ControladorTarifarioContrato::ctrActualizarTarifario($datos);
        echo json_encode($response);

    }

    public $estadoContrato;

    public function ajaxActualizarEstadoContrato()
    {

        $datos = array("estadoContrato" => $this->estadoContrato);


        $response = ControladorTarifarioContrato::ctrActualizarEstadoContrato($datos);
        echo json_encode($response);

    }

    public $filePDF;
    public function ajaxSubirPdf()
    {
        $item = "contratoDesc";
        $valor = $this->filePDF;
        $respuesta = ControladorTarifarioContrato::ctrActualizarFilePdf($item, $valor);
        echo json_encode($respuesta);

    }

    public $estadoEEFF;
    public function ajaxActualizarEstadoEEFF()
    {

        $datos = array("estadoEEFF" => $this->estadoEEFF);
        $response = ControladorTarifarioContrato::ctrActualizarEstadoEEFF($datos);
        echo json_encode($response);

    }

    public $fileEEFF;
    public function ajaxSubirPdfEEFF()
    {
        $valor = $this->fileEEFF;
        $respuesta = ControladorTarifarioContrato::ctrActualizarFilePdfEEFF( $valor);
        echo json_encode($respuesta);

    }

    public $draw;
    public function getDataTable()
    {
        $dataPost = array();
        if (isset($_POST["search"]["value"])) {
            $dataPost["search"] = $_POST["search"]["value"];
        }
        if (isset($_POST["order"])) {
            $dataPost["order"] = $_POST["order"];
        }
        if (isset($_POST["length"]) || ($_POST["length"] != -1)) {
            $dataPost["start"] = $_POST["start"];
            $dataPost["length"] = $_POST["length"];
        }

        $dataPost["draw"] = $this->draw;


        $classObj = new ControladorTarifarioContrato();
        $response = $classObj->queryDataTableController($dataPost);
        echo $response;
    }

    public $idFileEEFF;
    public $nameFileEEFF;
    public function ajaxBorrarFile()
    {
        $respuesta = ControladorTarifarioContrato::ctrBorrarFile($this->idFileEEFF,$this->nameFileEEFF);
        echo json_encode($respuesta);
    }


}

if (isset($_POST["draw"])) {

    $c = new AjaxTarCont();
    $c->draw = $_POST["draw"];
    $c->getDataTable();
}

if (isset($_POST["tarifarioDesc"])) {
    $obj1 = new AjaxTarCont();
    $obj1->estado = $_POST["estado"];
    $obj1->tarifarioDesc = $_POST["tarifarioDesc"];
    $obj1->ajaxActualizarTarifario();


}
if (isset($_POST["estadoContrato"])) {
    $obj1 = new AjaxTarCont();
    $obj1->estadoContrato = $_POST["estadoContrato"];
    $obj1->ajaxActualizarEstadoContrato();
}

if (isset($_FILES["archivoPdf"])) {

    $obj2 = new AjaxTarCont();
    $obj2->filePDF = $_FILES["archivoPdf"];
    $obj2->ajaxSubirPdf();
}

if (isset($_POST["estadoEEFF"])) {
    $obj3 = new AjaxTarCont();
    $obj3->estadoEEFF = $_POST["estadoEEFF"];
    $obj3->ajaxActualizarEstadoEEFF();
}


if (isset($_FILES["uploadEEFF"])) {


    $obj2 = new AjaxTarCont();
    $obj2->fileEEFF = $_FILES["uploadEEFF"];
    $obj2->ajaxSubirPdfEEFF();
}


if (isset($_POST["operation"]) && ($_POST["operation"] === "Del")) {


    $objDel = new AjaxTarCont();
    $objDel->idFileEEFF = $_POST["idFile"];
    $objDel->nameFileEEFF= $_POST["tagName"];
    $objDel->ajaxBorrarFile();

}