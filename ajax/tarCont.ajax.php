<?php
require_once "../controladores/tarifarioContrato.controlador.php";
require_once  "../modelos/tarifarioContrato.modelo.php";

class AjaxTarCont{

    public $estado;
    public $tarifarioDesc;

    public function ajaxActualizarTarifario(){

        $datos = array("estado"=>$this->estado,"tarifarioDesc"=>$this->tarifarioDesc);


        $response = ControladorTarifarioContrato::ctrActualizarTarifario($datos);
        echo json_encode($response);

    }

    public $estadoContrato;


    public function ajaxActualizarEstadoContrato(){

        $datos = array("estadoContrato"=>$this->estadoContrato);


        $response = ControladorTarifarioContrato::ctrActualizarEstadoContrato($datos);
        echo json_encode($response);

    }

    public $filePDF;
    public function ajaxSubirPdf(){
        $item = "contratoDesc";
        $valor = $this->filePDF;
        $respuesta = ControladorTarifarioContrato::ctrActualizarFilePdf($item , $valor);
        echo json_encode($respuesta);

    }




}


if (isset($_POST["tarifarioDesc"])){
    $obj1 = new AjaxTarCont();
    $obj1->estado = $_POST["estado"];
    $obj1->tarifarioDesc = $_POST["tarifarioDesc"];
    $obj1->ajaxActualizarTarifario();


}
if (isset($_POST["estadoContrato"])){
    $obj1 = new AjaxTarCont();
    $obj1->estadoContrato = $_POST["estadoContrato"];
    $obj1->ajaxActualizarEstadoContrato();


}

if (isset($_FILES["archivoPdf"])){

    $obj2 = new AjaxTarCont();
    $obj2->filePDF = $_FILES["archivoPdf"];
    $obj2->ajaxSubirPdf();


}