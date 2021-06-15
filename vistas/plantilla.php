
<?php 

session_start();
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejemplo de mvc</title>
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/7e33ddcf1a.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="continer-fluid">
		<h3 class="text-center py3">LOGOTIPO</h3>
	</div>
	<div class="container-fluid">
		<div class="container">
			<ul class="nav nav-justified py-2 nav-pills">

				<?php if (isset($_GET['pagina'])): ?>
					
				
				<?php if ($_GET['pagina'] == "registro"): ?>
					
				<li class="nav-item"><a href="index.php?pagina=registro" class="nav-link active">registro</a></li>

				<?php else: ?>

					<li class="nav-item"><a href="index.php?pagina=registro" class="nav-link">registro</a></li>

				<?php endif ?>

				<?php if ($_GET['pagina'] == "ingreso"): ?>

				<li class="nav-item"><a href="index.php?pagina=ingreso" class="nav-link active">ingreso</a></li>

				<?php else: ?>

					<li class="nav-item"><a href="index.php?pagina=ingreso" class="nav-link">ingreso</a></li>

				<?php endif?>

				<?php if ($_GET['pagina']== "inicio"): ?>

				<li class="nav-item"><a href="index.php?pagina=inicio" class="nav-link active">inicio</a></li>

				<?php else: ?>

					<li class="nav-item"><a href="index.php?pagina=inicio" class="nav-link">inicio</a></li>

				<?php endif ?>

				<?php if ($_GET['pagina']== "salir"): ?>

				<li class="nav-item"><a href="index.php?pagina=salir" class="nav-link active">salir</a></li>

				<?php else: ?>

					<li class="nav-item"><a href="index.php?pagina=salir" class="nav-link">salir</a></li>

				<?php endif ?>

				<?php else: ?>

				<li class="nav-item"><a href="index.php?pagina=registro" class="nav-link active">registro</a></li>

				<li class="nav-item"><a href="index.php?pagina=ingreso" class="nav-link">ingreso</a></li>

				<li class="nav-item"><a href="index.php?pagina=inicio" class="nav-link ">inicio</a></li>

				<li class="nav-item"><a href="index.php?pagina=salir" class="nav-link">salir</a></li>



				<?php endif ?>


			</ul> 
		</div>
	</div>
	<div class="container">
          <?php 

          if (isset($_GET['pagina'])) {

				          	if($_GET['pagina']=="registro" ||
				          	 $_GET['pagina']=="ingreso" ||
				          	  $_GET['pagina']=="salir" || 
				          	  $_GET['pagina']=="inicio" || $_GET['pagina'] == "editar")
							          	{
							          		

							          		include "paginas/".$_GET["pagina"].".php";
							          }else{
							          	include "paginas/eror404.php";							          
				          	} 
				          }
				          	else{ 
				          		include "paginas/registro.php"; 
				          	}

          ?>
          
</div>
</body>
</html>