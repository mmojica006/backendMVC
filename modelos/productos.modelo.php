<?php
require_once "conexion.php";

class ModeloProductos
{

    static public function mdlSeleccionarProductos($tabla)
    {

        $stmt = Conexion::conectar()->prepare("select * from  $tabla");
        $stmt->execute();

        return $stmt->fetch();

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

    static public function mdlActualizarForm($tabla, $id, $datos)
    {
        $response = [];

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, descripcion =:descripcion WHERE id =:id");

        $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
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

    static public function mdlActualizarBannerForm($tabla, $id, $datos)
    {
        $response = [];

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET bannertitulo = :bannertitulo, bannerdescripcion =:bannerdescripcion WHERE id =:id");

        $stmt->bindParam(":bannertitulo", $datos["bannerTitulo"], PDO::PARAM_STR);
        $stmt->bindParam(":bannerdescripcion", $datos["bannerDesc"], PDO::PARAM_STR);
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

    static public function mdlActualizarCapitalTrabajo($tabla, $id, $texto)
    {
        $response = [];

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET capitalTrabajo = :capitalTrabajo WHERE id =:id");

        $stmt->bindParam(":capitalTrabajo", $texto, PDO::PARAM_STR);
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

    static public function mdlActualizarCrediNegocio($tabla, $id, $texto)
    {
        $response = [];

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET crediNegocios = :crediNegocios WHERE id =:id");

        $stmt->bindParam(":crediNegocios", $texto, PDO::PARAM_STR);
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

    static public function mdlActualizarProductivo($tabla, $id, $texto)
    {
        $response = [];

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET activoProductivo = :activoProductivo WHERE id =:id");

        $stmt->bindParam(":activoProductivo", $texto, PDO::PARAM_STR);
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

    static public function mdlActualizarMejoraNegocio($tabla, $id, $texto)
    {
        $response = [];


        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET mejoraNegocio = :mejoraNegocio WHERE id =:id");

        $stmt->bindParam(":mejoraNegocio", $texto, PDO::PARAM_STR);
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

    static public function mdlActualizarCrediActivo($tabla, $id, $texto)
    {
        $response = [];

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET crediActivos = :crediActivos WHERE id =:id");

        $stmt->bindParam(":crediActivos", $texto, PDO::PARAM_STR);
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

    static public function mdlActualizarMegaTurbo($tabla, $id, $texto)
    {
        $response = [];

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET megaturbo = :megaturbo WHERE id =:id");

        $stmt->bindParam(":megaturbo", $texto, PDO::PARAM_STR);
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
