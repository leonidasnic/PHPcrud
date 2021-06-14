<?php 


class ControladorForularios
{
	/*create registro*/

	/*==============================
	=            Create            =
	==============================*/
	
	
	
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
					$respuesta = ModeloFormulario::mdlSeleccionarResgistro($tabla,null,null);
					return $respuesta;
				}
				
				/*===============================
				=            ingreso            =
				===============================*/

	public function ctrIngreso(){
		if (isset($_POST["ingresoEmail"])) {
			$tabla = "registros";
			$item = "email";
			$valor = $_POST['ingresoEmail'];
			$respuesta = ModeloFormulario::mdlSeleccionarResgistro($tabla,$item,$valor);

			if ($respuesta["email"]== $_POST['ingresoEmail'] && $respuesta["password"]==$_POST['ingresoPassword']) {

				$_SESSION['validarIngreso'] = "ok";
				
				echo "INGRESO EXITOSO";
				echo '<script>

			if( window.history.replaceState){
			  window.history.replaceState(null, null, window.location.href )
			}
			window.location = "index.php?pagina=inicio";
			</script>';

			}
			else{
							echo '<script>

			if( window.history.replaceState){
			  window.history.replaceState(null, null, window.location.href )
			}
			</script>';

			echo '<div class="alert alert-danger">el usuario no esta registrado</div>';
						}

			
		}
		else{
							echo '<script>

			if( window.history.replaceState){
			  window.history.replaceState(null, null, window.location.href )
			}
			</script>';

			echo '<div class="alert alert-success"> Bienvenido ingrese el correo y el password</div>';
						}
	
				
				}
				
				
}