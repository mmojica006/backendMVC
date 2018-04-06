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

    static public function mdlActualizarEstadoContrato($tabla,$id,$datos){
        $response = [];


        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET contratoEstado = :contratoEstado WHERE id =:id");
        $stmt->bindParam(":contratoEstado", $datos["estadoContrato"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
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


    static public function mdlActualizarEstadoEEFF($tabla,$id,$datos){
        $response = [];


        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET eeffEstado = :eeffEstado WHERE id =:id");
        $stmt->bindParam(":eeffEstado", $datos["estadoEEFF"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
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

    static public function mdlActualizarFilePdf($tabla, $id, $item, $valor){
        $response = [];

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE id = :id");

        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
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

    static public function mdlActualizarFilePdfEEFF($tabla,   $file,$file_size,$file_type,$folder){
        $response = [];

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (name,size,type,location) values(:name,:size,:type,:location)");

        $stmt->bindParam(":name", $file, PDO::PARAM_STR);
        $stmt->bindParam(":size", $file_size, PDO::PARAM_STR);
        $stmt->bindParam(":type", $file_type, PDO::PARAM_STR);
        $stmt->bindParam(":location", $folder, PDO::PARAM_STR);
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

    public function queryDTModel($dataPost)
    {

        $query = '';

        $query .= "SELECT * FROM tbl_upload ";
        // print_r($dataPost);

        if ($dataPost["search"] != '') {
            $query .= 'WHERE name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $query .= 'OR location LIKE "%' . $_POST["search"]["value"] . '%" ';
        }


        if (array_key_exists("order", $dataPost)) {


            $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $query .= 'ORDER BY id ASC ';
        }

        if (array_key_exists("length", $dataPost)) {
            $query .= 'LIMIT ' . $dataPost["start"] . ', ' . $dataPost["length"];
        }

        $stmt = Conexion::conectar()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }
    public function get_total_all_records()
    {
        $stmt = Conexion::conectar()->prepare("select * from tbl_upload");
        $stmt->execute();
        return $stmt->rowCount();
        $stmt->close();
        $stmt = null;


    }

    public  function mdlBorrarFile($id, $tabla)
    {
        $response = [];
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla where id=:id");
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
