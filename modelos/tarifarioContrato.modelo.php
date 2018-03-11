<?php
require_once "conexion.php";

class ModeloTarifarioContrato{
    static public function mdlSeleccionarTarCont($tabla){

        $stmt = Conexion::conectar()->prepare("select * from  $tabla");
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
        $stmt = null;
    }

    static public function mdlActualizarTarifario($tabla,$id,$datos){
        $response = [];

        if (empty($id)){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (tarifario,tarifarioEstado) values(:tarifario,:tarifarioEstado)");
        }else{
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tarifario = :tarifario, tarifarioEstado =:tarifarioEstado WHERE id =:id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        }

        $stmt->bindParam(":tarifario", $datos["tarifarioDesc"], PDO::PARAM_STR);
        $stmt->bindParam(":tarifarioEstado", $datos["estado"], PDO::PARAM_INT);
        $stmt->execute();
        if($stmt->errorCode()== 0){
            $response["num"]=0;
            $response["msg"]="OK";


        }else{

            $response["num"]=$stmt->errorCode();
            $response["msg"]=$stmt->errorInfo();

        }
        return  $response;

        $stmt->close();
        $stmt = null;


    }


}
