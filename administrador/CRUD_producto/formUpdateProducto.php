
<?php
	$id_prod = $_GET['id_prod'];

	require("../../conexion.php");

	$sql = "select*from productos where id_prod = $id_prod";
	$res = $con->query($sql);
	$datos = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Actualizar</title>
	<link rel="stylesheet" href="">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <!-- Compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     <!-- versión de desarrollo, incluye advertencias de ayuda en la consola -->
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>
<body class=" ">
	<div class="navbar-fixed ">
		<nav>
		    <div class="nav-wrapper blue darken-2">
		      <a href="#!" class="brand-logo"><i class="material-icons">shopping_cart</i>Actualizar</a>
		      <a href="readProductos.php"  class="sidenav-trigger"><i class="material-icons">arrow_back</i></a>
		      <ul class="right hide-on-med-and-down">
		        <li><a href="readProductos.php"><i class="material-icons left">arrow_back</i>Regresar</a></li>
		      </ul>
		    </div>
		</nav>
	</div>
	

	  <div class="container ">
	  	<div class="section">
	  		<div class="row">
	  		    <form method="post" action="updateProducto.php" class="col s12 blue-text text-darken-2 ">
	  		      <div class="row">
	  		        <div class="input-field col s12 m6 l6 ">
	  		          <i class="material-icons prefix">account_circle</i>
	  		          <input name="nombre" id="nombre" type="text" class="validate " value="<?php echo $datos['nombre'] ?>">
	  		          <label for="nombre">Nombre</label>
	  		          <span class="helper-text" data-error="Complete el campo" data-success="Bien"></span>
	  		        </div>
	  		        <div class="input-field col s12 m6 l6">
	  		          <i class="material-icons prefix">phone</i>
	  		         <textarea name="descripcion" id="textarea1" class="materialize-textarea"><?php echo $datos['descripcion'] ?></textarea>
	  		         <label for="textarea1">Descripción</label>
	  		          <span class="helper-text" data-error="Complete el campo" data-success="Bien"></span>
	  		        </div>
	  		        <div class="input-field col s12 m6 l6 ">
	  		          <i class="material-icons prefix">account_circle</i>
	  		          <input name="precio" id="precio" type="text" class="validate " value="<?php echo $datos['precio'] ?>">
	  		          <label for="precio">Precio</label>
	  		          <span class="helper-text" data-error="Complete el campo" data-success="Bien"></span>
	  		        </div>

	  		        <div class="input-field col s12 m6 l6">
	  		        	<i class="material-icons prefix">https</i>
	  		        	<input name="existentes" id="existentes" type="number" class="validate"value="<?php echo $datos['existentes'] ?>">
	  		        	<label for="existentes">Existentes</label>
	  		        	<span class="helper-text" data-error="Complete el campo" data-success="Bien"></span>
	  		        </div>
	  		        <input type="hidden" name="id" value="<?php echo $datos['id_prod'] ?>">
	  		      </div>
	  		      <div class="row">
	  		      	<input value="Actualizar" class="btn blue darken-2 col s12" type="submit">
	  		      </div>
	  		    </form>
	  		  </div>
	  	</div>
	  </div>

	  <style>
	  
 	  </style>
	  <script>
	  	$(document).ready(function(){
	  	  $('.sidenav').sidenav();
	  	  $('select').formSelect();
	  	});

	  </script>
</body>
</html>