<?php

include_once "conexion.php";

class ModeloCanales
{

    static public function mdlSeleccionarCanales($tabla)
    {

        $stmt = Conexion::conectar()->prepare("select * from  $tabla");
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
        $stmt = null;


    }

    static public function mdlGetSingleMarket($id, $tabla)
    {

        $stmt = Conexion::conectar()->prepare("select * from  $tabla where id=:id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->close();
        $stmt = null;


    }

    static public function mdlActualizarImgFondo($tabla, $id, $item, $valor)
    {
        $response = [];

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE id = :id");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
//        echo "\nPDOStatement::errorInfo():\n";
//        $arr = $stmt->errorInfo();
//        print_r($arr);

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

    static public function mdlSeleccionarDireccion($tabla)
    {
        $stmt = Conexion::conectar()->prepare("select * from markers");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;

    }

    public function queryDTModel($dataPost)
    {

        $query = '';

        $query .= "SELECT * FROM markers ";
        // print_r($dataPost);

        if ($dataPost["search"] != '') {
            $query .= 'WHERE name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $query .= 'OR address LIKE "%' . $_POST["search"]["value"] . '%" ';
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
        $stmt = Conexion::conectar()->prepare("select * from markers");
        $stmt->execute();
        return $stmt->rowCount();
        $stmt->close();
        $stmt = null;


    }

    public function mdlGuardarDireccion($data, $tabla)
    {

        $response = [];

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (name,lat,lng) values(:name,:lat,:lng)  ");

        $stmt->bindParam(":name", $data["sucursal"], PDO::PARAM_STR);
        $stmt->bindParam(":lat", $data["latitud"], PDO::PARAM_STR);
        $stmt->bindParam(":lng", $data["longitud"], PDO::PARAM_STR);
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

    public function mdlActualizarSingleData($data, $tabla)
    {
        $response = [];


        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET name=:name, lat=:lat, lng=:lng WHERE id=:id ");
        $stmt->bindParam(":name", $data["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":lat", $data["latitud"], PDO::PARAM_STR);
        $stmt->bindParam(":lng", $data["longitud"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $data["id"], PDO::PARAM_STR);
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