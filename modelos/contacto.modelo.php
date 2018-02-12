
<?php
require_once "conexion.php";
class ModeloContacto{

	static public function mdlSeleccionarContacto($tabla){

		$stmt = Conexion::conectar()->prepare("select * from  $tabla");
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
		$stmt = null;


	}

	static public function mdlActualizarImgFondo($tabla, $id, $item, $valor){
		 $response = [];

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE id = :id");

		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
//        echo "\nPDOStatement::errorInfo():\n";
//        $arr = $stmt->errorInfo();
//        print_r($arr);

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