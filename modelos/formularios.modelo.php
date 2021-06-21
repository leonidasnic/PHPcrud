<?php

require_once "conexion.php";

class ModeloFormulario{
	/* registro
	 */
	
	
	static public function mdlRegistro($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(token,nombre, email, password) VALUES (:token,:nombre, :email, :password)");

		#bindparam() vincula una variable php a un 
		$stmt->bindParam(":token",$datos["token"],PDO::PARAM_STR);
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
	
	
	

	static public function mdlSeleccionarResgistro($tabla,$item,$valor){

		if ($item == null || $valor == null) {
			
		

		$stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha, '%d/%m/%y') AS fecha FROM $tabla ORDER BY id DESC");

		$stmt->execute();

		return $stmt -> fetchAll();

		
		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor,PDO::PARAM_STR);

				IF($stmt->execute()){
					return $stmt -> fetch();
				}else{
					print_r(Conexion:conectar()->erorInfor());
				}
 

		}

		$stmt->close();
		$stmt = null;
	}

	/*========================
	=ACTUALIZAR REGISTROS                        =
	========================*/

	static public function mdlActualizarRegistro($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre =:nombre, email=:email, password=:password WHERE token=:token");

		#bindparam() vincula una variable php a un 
		$stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
		$stmt->bindParam(":email",$datos["email"],PDO::PARAM_STR);
		$stmt->bindParam(":password",$datos["password"],PDO::PARAM_STR);
		$stmt->bindParam(":token",$datos["token"],PDO::PARAM_STR);

		IF($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion:conectar()->erorInfor());
		}
		$stmt -> close();
		$stmt = null;
	}

	/*=========================================
	=            Eliminar Registro            =
	=========================================*/
	
	static public function mdlElimnarRegistro($tabla,$valor){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE token= :token");

		#bindparam() vincula una variable php a un 
		$stmt->bindParam(":token",$valor,PDO::PARAM_INT);

		IF($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion:conectar()->erorInfor());
		}

		$stmt -> close();
		$stmt = null;

	}

	/*====================================================
	=            Actualizar Intentos Fallidos            =
	====================================================*/
	
	
	static public function mdlActualizarIntentosFallidos($tabla,$valor,$token){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET intentos_fallidos =:intentos WHERE token=:token");

		#bindparam() vincula una variable php a un 
		$stmt->bindParam(":intentos",$valor,PDO::PARAM_INT);
		$stmt->bindParam(":token",$token,PDO::PARAM_STR);

		IF($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion:conectar()->erorInfor());
		}
		$stmt -> close();
		$stmt = null;
	}

	
	
	
}