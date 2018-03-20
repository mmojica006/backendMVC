
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


    public function queryDTModel($dataPost)
    {

        $query = '';

        $query .= "SELECT * FROM tbl_reclamo ";
        // print_r($dataPost);

        if ($dataPost["search"] != '') {
            $query .= 'WHERE Nombre LIKE "%' . $_POST["search"]["value"] . '%" ';
            $query .= 'OR cedula LIKE "%' . $_POST["search"]["value"] . '%" ';
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
        $stmt = Conexion::conectar()->prepare("select * from tbl_reclamo");
        $stmt->execute();
        return $stmt->rowCount();
        $stmt->close();
        $stmt = null;


    }





}