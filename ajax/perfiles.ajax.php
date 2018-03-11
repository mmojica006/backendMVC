<?php
require_once "../controladores/perfiles.controlador.php";
require_once "../modelos/perfiles.modelo.php";

class AjaxPerfiles{

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


        $classObj = new ControladorPerfiles();
        $response = $classObj->queryDataTableController($dataPost);
        echo $response;
    }

}

if (isset($_POST["draw"])) {
    $c = new AjaxPerfiles();
    $c->draw = $_POST["draw"];
    $c->getDataTable();
}
