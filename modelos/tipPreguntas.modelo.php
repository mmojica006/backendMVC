<?php

require_once "conexion.php";
class  ModeloTipsPreguntas{

    static public function mdlSeleccionarTipPreguntas($tabla){

        $stmt = Conexion::conectar()->prepare("select * from  $tabla");
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
        $stmt = null;


    }

    static public function mdlActualizartipos($tabla, $id, $texto)
    {
        $response = [];

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tipsFinanc = :tipsFinanc WHERE id =:id");

        $stmt->bindParam(":tipsFinanc", $texto, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->errorCode() == 0) {
            $response["num"] = 0;
            $response["msg"] = "OK";
        } else {

            $response["num"] = $stmt->errorCode();
            $response["msg"] = $stmt->errorInfo();

        }
        return $response;

        $stmt->close();
        $stmt = null;

    }

    static public function mdlActualizarPreguntas($tabla, $id, $texto)
    {
        $response = [];

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET preguntas = :preguntas WHERE id =:id");

        $stmt->bindParam(":preguntas", $texto, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->errorCode() == 0) {
            $response["num"] = 0;
            $response["msg"] = "OK";
        } else {

            $response["num"] = $stmt->errorCode();
            $response["msg"] = $stmt->errorInfo();

        }
        return $response;

        $stmt->close();
        $stmt = null;

    }

}