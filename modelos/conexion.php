<?php
class Conexion{
	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=crediweb",
						"crediweb",
						"!Claroa2060",
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")  //Traer todo con los caracteres latinos
						);

		return $link;

	}


}
