
<?php
if (isset($_GET['id'])) {
  $item = "id";
  $valor = $_GET['id'];



   $usuarios = ControladorForularios::ctrSeleccionarRegistro($item,$valor);


 }
  
 ?>
<div class="d-flex justify-content-center">

<form  cflass="bg-light p-1" method="post">
  <div class="form-group">

    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-ad"></i>
        </span>
      </div>
        <input type="text"  placeholder="escriba su nombre" class="form-control" value="<?php echo $usuarios["nombre"] ?>" id="nombre" name="actualizarNombre">
    </div>
    
  </div> 

  <div class="form-group">

    <input type="email" placeholder="escriba su email" class="form-control"  value="<?php echo $usuarios["email"] ?>" id="email" name="actualizarEmail">
  </div>

  <div class="form-group">
    
    <input type="password" placeholder="ingrese su contrasena" class="form-control" id="pwd" name="actualizarPassword">
  </div>

  <input type="hidden" name="passwordActual" value="<?php echo $usuarios["password"] ?>">

  <input type="hidden" name="idUsuario" value="<?php echo $usuarios["id"] ?>">
<?php 

$actualizar  = ControladorForularios::ctrActualizarRegistro();
  if ($actualizar == "ok") {
    echo '<script>
    if(window.history.replaceState){
      window.history.replaceState(null, null, window.location.href );

    }
    </script>';
    echo '<div class="alert alert-success"> El usuario ha sido actualizado </div>' ;
     echo '<script> setTimeout(function(){
      window.location = "index.php?pagina=inicio";
    },3000)  </script>';
  }

/*$registro = ControladorForularios::ctrRegistro();
if ($registro == "ok") {

echo '<script>

if( window.history.replaceState){
  window.history.replaceState(null, null, window.location.href )
}
</script>';

echo '<div class="alert alert-success">El registro a sido guardado exitosamente</div>';
}*/

?>
  <button type="submit"  class="btn btn-primary">actualizar</button>
</form>  
 
</div>