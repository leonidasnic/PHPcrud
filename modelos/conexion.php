<?php 
class Conexion{

	static public function conectar(){
		#pdo servername, db, user, password.

		$link =  new PDO("mysql:host=localhost;dbname=curso-php","root","");
		$link->exec("set names utf8");
		return $link;
	}
}