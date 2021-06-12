<?php 


class ControladorForularios
{
	/*create registro*/
	static public function ctrRegistro()
	{
		if (isset($_POST['registroNombre'])) {
			$tabla = "registros";

			$datos = array('nombre' =>$_POST['registroNombre'] , 'email' =>$_POST['registroEmail'],'password' =>$_POST['registroPassword']);

			$respuesta = ModeloFormulario::mdlRegistro($tabla,$datos);
			return $respuesta;
		}
						
	}

		/*=============================================
				=  select           =
				=============================================*/
				
	static public function ctrSeleccionarRegistro(){
					$tabla = "registros";
					$respuesta = ModeloFormulario::mdlSeleccionarResgistro($tabla);
					return $respuesta;
				}
				
}