
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

		if($stmt->execute()){
			$response["num"]=0;
			$response["msg"]="OK";
			

		}else{

		$response["num"]=1;
		$response["msg"]="Error";
		
		}
		return  $response;

		$stmt->close();
		$stmt = null;

	}

}