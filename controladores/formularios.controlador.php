<?php 


class ControladorForularios
{
	/*create registro*/

	/*==============================
	=            Create            =
	==============================*/
	
	
	
	static public function ctrRegistro(){

		if (isset($_POST["registroNombre"])) {

			if (preg_match('/^[a-zA-ZáéíúÁÉÍÓÚ ]+$/',$_POST["registroNombre"])	&& 
				preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$_POST["registroEmail"]) &&
				preg_match('/^[0-9a-zA-Z]+$/',$_POST["registroPassword"]))
				{


					$tabla = "registros";

					$token = md5($_POST["registroNombre"]."+".$_POST["registroEmail"]);

					$datos = array("token"=>$token,'nombre' =>$_POST['registroNombre'] , 'email' =>$_POST['registroEmail'],'password' =>$_POST['registroPassword']);

					$respuesta = ModeloFormulario::mdlRegistro($tabla,$datos);
					return $respuesta;
				}else {
					$respuesta = "eror";
					return $respuesta;
				}
		}
						
	}

		/*=============================================
				=  select           =
				=============================================*/
				
	static public function ctrSeleccionarRegistro($item,$valor){
					$tabla = "registros";
					$respuesta = ModeloFormulario::mdlSeleccionarResgistro($tabla,$item,$valor);
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


			if (gettype($respuesta)=='array') {
				
			
				if ($respuesta['email'] == $_POST['ingresoEmail'] &&
				 $respuesta['password']==$_POST['ingresoPassword']) {

				 	 ModeloFormulario::mdlActualizarIntentosFallidos($tabla,0,$respuesta["token"]);

					$_SESSION['validarIngreso'] = "ok";
					
					echo "INGRESO EXITOSO";
					echo '<script>

				if( window.history.replaceState){
				  window.history.replaceState(null, null, window.location.href )
				}
				window.location = "index.php?pagina=inicio";
				</script>';

				}else{
							

							if ($respuesta["intentos_fallidos"] < 3) {

								$intentos_fallidos = $respuesta["intentos_fallidos"]+1;

							ModeloFormulario::mdlActualizarIntentosFallidos($tabla,$intentos_fallidos,$respuesta["token"]);
							}else{
								echo '<div class="alert alert-warning"> RECATCHA debes validar que no eres un robot</div>';
							}

								echo '<script>

				if( window.history.replaceState){
				  window.history.replaceState(null, null, window.location.href )
				}
				</script>';

				echo '<div class="alert alert-danger">Correo o Contraseña erronea</div>';
							}
			}else{

							echo '<script>

			if( window.history.replaceState){
			  window.history.replaceState(null, null, window.location.href )
			}
			</script>';

			echo '<div class="alert alert-success">No se encontro ningun usuario</div>';
						}

			}

			
		}


		
	
				
		


				/*===========================================
				=            Actualizar registro            =
				===========================================*/
				

				static public function ctrActualizarRegistro(){

					if (isset($_POST['actualizarNombre'])) {


			if (preg_match('/^[a-zA-ZáéíúÁÉÍÓÚ ]+$/',$_POST["actualizarNombre"])	&& 
				preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$_POST["actualizarEmail"]) ){

						$usuario = ModeloFormulario::mdlSeleccionarResgistro("registros","token",$_POST['tokenUsuario']);
						$comparartoken = md5($usuario["nombre"]."+".$usuario["email"]);
						if ($comparartoken == $_POST["tokenUsuario"]) {
						
						

							if ($_POST['actualizarPassword']!=""){
								if (preg_match('/^[0-9a-zA-Z]+$/',$_POST["actualizarPassword"])) {
									$password = $_POST['actualizarPassword'];
								}

								
							}else{

								$password = $_POST['passwordActual'];
							}

										$tabla = "registros";

										$datos = array("token" => $_POST['tokenUsuario'],"nombre" =>$_POST['actualizarNombre'] , "email" =>$_POST['actualizarEmail'],'password' =>$password);

										$respuesta = ModeloFormulario::mdlActualizarRegistro($tabla,$datos);
										return $respuesta;			
								}else{
									$respuesta = "eror";
									return $respuesta;

								}

							  }else{
									$respuesta = "eror";
									return $respuesta;
								}
							}
						}


				/*=========================================
				=            ELiminar Registro            =
				=========================================*/
				
				public function ctrEliminarRegistro(){
					if (isset($_POST['EliminarRegistro'])) {

					$usuario = ModeloFormulario::mdlSeleccionarResgistro("registros","token",$_POST['EliminarRegistro']);
						
					$comparartoken = md5($usuario["nombre"]."+".$usuario["email"]);
					if ($comparartoken == $_POST["EliminarRegistro"]) {

								$tabla = "registros";
								$valor = $_POST["EliminarRegistro"];
							$respuesta = ModeloFormulario::mdlElimnarRegistro($tabla, $valor);

							if ($respuesta == "ok") {
								echo '<script>

										if( window.history.replaceState){
										  window.history.replaceState(null, null, window.location.href )
										}
										window.location = "index.php?pagina=inicio";
										</script>';
							}
					}

				}
			}
				
				
}