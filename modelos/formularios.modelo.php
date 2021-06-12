<?php

require_once "conexion.php";

class ModeloFormulario{
	/* registro
	 */
	
	
	static public function mdlRegistro($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, email, password) VALUES (:nombre, :email, :password)");

		#bindparam() vincula una variable php a un 
		$stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
		$stmt->bindParam(":email",$datos["email"],PDO::PARAM_STR);
		$stmt->bindParam(":password",$datos["password"],PDO::PARAM_STR);

		IF($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion:conectar()->erorInfor());
		}
		$stmt -> close();
		$stmt = null;
	}

	/*=============================================
	=            seleccionar registro            =
	=============================================*/
	
	
	

	static public function mdlSeleccionarResgistro($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha, '%d/%m/%y') AS fecha FROM $tabla ORDER BY id DESC");

		$stmt->execute();
		return $stmt -> fetchAll();

		$stmt->close();
		$stmt = null;

	}
}