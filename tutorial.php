<?php 

#objeto
$frutas = (object)["fruta1"=>"pera","fruta2"=>"manzana"];

echo "Esto es una variable objeto: $frutas->fruta1 <br>";

var_dump($frutas);


#funciones
function saludo(){
	echo "hola";
}

saludo();

function despedia($adios){
	echo $adios;
}

despedia("hola");

function retorno($retornar){
	return $retornar;

}


#ciclos

$n = 1;
while ($n < 5){
	echo $n;
	$n++;
}

#codigo imperactivo
$auto1 = (object) ["marca"=>"toyota","modelo"=>"Corolla"];
$auto2 = (object) ["marca"=>"hyundai","modelo"=>"Accent"];

function mostrarautomovil($automovil){
	echo "<h1>soy un $automovil->marca,modelo $automovil->modelo</h1>";
}

mostrarautomovil($auto2);


#condigoPOO
/**
 modelo para crear objetos
 */
class Automovil{

	public $marca;
	public $modelo;

	#metodo
	public function mostrar(){
		echo "<p> Hola soy un $this->marca, modelo $this->modelo";
	}
}

$a = new Automovil();
$a -> marca = "toyota";
$a ->modelo = "corolla";

$a -> mostrar();
?>