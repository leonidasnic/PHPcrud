<?php  

if (!isset($_SESSION['validarIngreso'])) {
  echo '<script> window.location = "index.php?pagina=ingreso" </script>';

    return;
  
  }else{

        if ($_SESSION['validarIngreso']!= "ok") {
        echo '<script> window.location = "index.php?pagina=ingreso" </script>';
        return;
      }
    
    
  }


$usuarios = ControladorForularios::ctrSeleccionarRegistro(null,null);



?>
<table class="table table-striped py-5">
    <thead>
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>email</th>
        <th>Password</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($usuarios as $key => $value): ?>
         <tr>
          <td><?php echo($key+1)?></td>
        <td><?php echo $value["nombre"] ?></td>
        <td><?php echo $value["email"] ?></td>
        <td><?php echo $value["fecha"] ?></td>
        <td>
          <div class="btn-group">
            <a href="index.php?pagina=editar&id=<?php echo $value["id"] ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
            <a class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
          </div>
        </td>
      </tr>
      <?php endforeach ?>
     
      
    </tbody>
  </table>