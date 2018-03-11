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




}


if (isset($_POST["tarifarioDesc"])){
    $obj1 = new AjaxTarCont();
    $obj1->estado = $_POST["estado"];
    $obj1->tarifarioDesc = $_POST["tarifarioDesc"];
    $obj1->ajaxActualizarTarifario();


}
