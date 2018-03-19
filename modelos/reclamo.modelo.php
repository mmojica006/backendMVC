
<?php
require_once "conexion.php";
class ModeloReclamo{

    static public function mdlSeleccionarReclamo($tabla){

        $stmt = Conexion::conectar()->prepare("select * from  $tabla");
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
        $stmt = null;


    }


    static public function mdlActualizarForm($tabla,$id,$datos){
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



}