
<div class="d-flex justify-content-center">

<form  cflass="bg-light p-1" method="post">
  <div class="form-group">

    <label for="nombre">Nombre</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-ad"></i>
        </span>
      </div>
        <input type="text" class="form-control" id="nombre" name="registroNombre">
    </div>
    
  </div> 

  <div class="form-group">
    <label for="email">email</label>
    <input type="email" class="form-control" id="email" name="registroEmail">
  </div>

  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="registroPassword">
  </div>
<?php 
$registro = ControladorForularios::ctrRegistro();
if ($registro == "ok") {

echo '<script>

if( window.history.replaceState){
  window.history.replaceState(null, null, window.location.href )
}
</script>';

echo '<div class="alert alert-success">El registro a sido guardado exitosamente</div>';
}

?>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>  
 
</div>