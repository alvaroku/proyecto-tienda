<?php session_start(); 

require '../../conexion.php';

//obtener info usuario
if (!isset($_SESSION['id_us']) || empty($_SESSION['id_us'])) {
     //echo "No se ha iniciado sesion";
          //echo "<a href='index.html'>Volver</a>";
}else{
     $id_us =  $_SESSION['id_us'];
     $sql="select nombre, apellido, email from usuarios where id_us = '$id_us'";
     $resultado=$con->query($sql);
     $row=$resultado->fetch_assoc();
     $nombre = $row['nombre'];
     $apellido = $row['apellido'];
     $correo = $row['email'];     
} 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Productos</title>
	<link rel="stylesheet" href="">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <!-- Compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body class="">
	<div class="navbar-fixed ">
		<nav>
		    <div class="nav-wrapper blue darken-2">
		      <a href="#!" class="brand-logo"><i class="material-icons">shopping_cart</i>Agregar</a>
		      <a href="readProductos.php"  class="sidenav-trigger"><i class="material-icons">arrow_back</i></a>
		      <ul class="right hide-on-med-and-down">
		        <li><a href="readProductos.php"><i class="material-icons left">arrow_back</i>Regresar</a></li>
		      </ul>
		    </div>
		</nav>
	</div>

	 

	<div id="contenedor_carga" class="contenedor_carga">
          <div class="carga"></div>
   </div>
   <div class="container ">
   	  	<div class="section">
   	  		<div class="row">
   	  		    <form method="post" action="createProducto.php" class="col s12 blue-text text-darken-2 ">
   	  		      <div class="row">
   	  		        <div class="input-field col s12 m6 l6 ">
   	  		          
   	  		          <input name="nombre" id="nombre" type="text" class="validate ">
   	  		          <label for="nombre">Nombre</label>
   	  		          <span class="helper-text" data-error="Complete el campo" data-success="Bien"></span>
   	  		        </div>
   	  		        <div class="input-field col s12 m6 l6">
   	  		         
   	  		         <textarea name="descripcion" id="textarea1" class="materialize-textarea"></textarea>
   	  		         <label for="textarea1">Descripción</label>
   	  		          <span class="helper-text" data-error="Complete el campo" data-success="Bien"></span>
   	  		        </div>
   	  		        <div class="input-field col s12 m6 l6 ">
   	  		          
   	  		          <input name="precio" id="precio" type="text" class="validate ">
   	  		          <label for="precio">Precio</label>
   	  		          <span class="helper-text" data-error="Complete el campo" data-success="Bien"></span>
   	  		        </div>

   	  		        <div class="input-field col s12 m6 l6">
   	  		        	
   	  		        	<input name="existentes" id="existentes" type="number" class="validate">
   	  		        	<label for="existentes">Existentes</label>
   	  		        	<span class="helper-text" data-error="Complete el campo" data-success="Bien"></span>
   	  		        </div>
   	  		      </div>
   	  		      <div class="row">
   	  		      	<input class="btn blue darken-2 col s12" type="submit" value="Agregar">
   	  		      </div>
   	  		    </form>
   	  		  </div>
   	  	</div>
   	  </div>
	

	 
	<style>
		/*splash*/
		.contenedor_carga{
		 background-color: rgba(250,240,245,0.9) ;
		 height: 100%;
		 width: 100%;
		 position: fixed;
		 transition: all 1s ease;
		 z-index: 10000;
		}
		.carga{
		 border: 15px solid #ccc;
		 border-top-color: #f4266A;
		 border-top-style: groove;
		 height: 100px;
		 width: 100px;
		 border-radius: 100%;
		 position: absolute;
		 top: 0;
		 left: 0;
		 right: 0;
		 bottom: 0;
		 margin: auto;
		 animation: girar 1s linear infinite;
		}
		@keyframes girar{
		 from{
		      transform: rotate(0deg);
		 }
		 to{
		      transform: rotate(360deg);
		 }
		}

	</style>
	<script>
	  //esconder el circulo de carga
       window.onload = function(){
       	var contenedor = document.getElementById("contenedor_carga");
         contenedor.style.visibility = "hidden";
         contenedor.style.opacity = '0';
      }

      $(document).ready(function(){
	  	  $('.sidenav').sidenav();
	  	  $('.modal').modal();
	  	});
	</script>
</body>
</html>