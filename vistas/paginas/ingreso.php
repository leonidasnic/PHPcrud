
<div class="d-flex justify-content-center">

<form  cflass="bg-light p-1" method="post">
 

  <div class="form-group">
    <label for="email">email</label>
    <input type="email" class="form-control" id="email" name="ingresoEmail">
  </div>

  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="ingresoPassword">
  </div>
<?php 
$ingreso = new ControladorForularios();
$ingreso -> ctrIngreso();



?>
  <button type="submit" class="btn btn-primary">Ingresar</button>
</form>  
 
</div>