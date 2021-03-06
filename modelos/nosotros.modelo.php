<?php
require_once "conexion.php";
class ModeloNosotros{

    static public function mdlSeleccionarNosotros($tabla){
        $stmt = Conexion::conectar()->prepare("select * from  $tabla");
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
        $stmt = null;

    }

    static public  function mdlActualizarImgNosotros($tabla, $id, $item, $valor){
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

    static public function mdlActualizarBannerForm($tabla,$id,$datos){
        $response = [];

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET bannertitulo = :bannertitulo, bannerdescripcion =:bannerdescripcion WHERE id =:id");

        $stmt->bindParam(":bannertitulo", $datos["bannerTitulo"], PDO::PARAM_STR);
        $stmt->bindParam(":bannerdescripcion", $datos["bannerDesc"], PDO::PARAM_STR);
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

    static public function mdlActualizarInfo1($tabla,$id,$datos){
        $response = [];

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, descripcion =:descripcion WHERE id =:id");

        $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
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

    static public function mdlActualizarInfo2($tabla,$id,$datos){
        $response = [];

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET mision = :mision, vision =:vision, valores =:valores  WHERE id =:id");

        $stmt->bindParam(":mision", $datos["mision"], PDO::PARAM_STR);
        $stmt->bindParam(":vision", $datos["vision"], PDO::PARAM_STR);
        $stmt->bindParam(":valores", $datos["valores"], PDO::PARAM_STR);
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
}