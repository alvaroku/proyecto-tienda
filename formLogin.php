<?php 
if(isset($_GET['log']) && !empty($_GET['log'])){
	$error = $_GET['log'];
	switch($error){
		case 5:
			$alerta = "<script>
					Swal.fire({
				  	icon: 'error',
				  	title: 'Oops...',
				  	text: 'Correo o contraseña incorrecto'
					})
					</script>";
			break;
		case 6:
			$alerta = "<script>
					Swal.fire({
				  	icon: 'error',
				  	title: 'Oops...',
				  	text: 'Algo salió mal!'
					})
					</script>";
			break;

	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
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

	 <!-- sweet alert -->
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body >
	<?php 
	if(isset($alerta)){
		 echo $alerta;
	} 
	 ?>
	<div class="navbar-fixed ">
		<nav>
		    <div class="nav-wrapper blue darken-2">
		      <a href="#!" class="brand-logo">Coffee shop</a>
		      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
		      <ul class="right hide-on-med-and-down">
		        <li><a href="index.php"><i class="material-icons right">home</i>Inicio</a></li>
		        <li><a href="signup.html"><i class="material-icons right">description</i>Registro</a></li>
		      </ul>
		    </div>
		</nav>
	</div>
	

	  <ul class="sidenav" id="mobile-demo">
	    <li><a href="index.php"><i class="material-icons">home</i>Inicio</a></li>
	    <li><a href="signup.html"><i class="material-icons">description</i>Registro</a></li>
	  </ul>


	  <div id="contenedor_carga" class="contenedor_carga">
	            <div class="carga"></div>
	  </div>
	  <div class="container ">
	  	<div class="section">
	  		<div class="row">
	  			<div class="col s1 m3"></div>
	  		    <form method="post" action="login.php" class="col s10 m6 blue-text text-darken-2 ">
	  		      <div class="row">
	  		       <div class="row">
	  		       	<div class="input-field col s12">
	  		       		<i class="material-icons prefix">mail</i>
	  		       		<input name="email" id="email" type="email" class="validate">
	  		       		<label for="email">Email</label>
	  		       		<span class="helper-text" data-error="Complete el campo" data-success="Bien"></span>
	  		       	</div>
	  		       </div>
	  		       <div class="row">
	  		        	<div class="input-field col s12">
	  		        		<i class="material-icons prefix">https</i>
	  		        		<input name="password" id="password" type="password" class="validate">
	  		        		<label for="password">Contraseña</label>
	  		        		<span class="helper-text" data-error="Complete el campo" data-success="Bien"></span>
	  		        	</div>
	  		       </div>
	  		       <input class="btn blue darken-2 col s12" type="submit">
	  		      </div>
	  		    </form>
	  		    <div class="col s1 m3"></div>
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
	  	$(document).ready(function(){
	  	  $('.sidenav').sidenav();
	  	});


	  	//esconder el circulo de carga
       window.onload = function(){
       	var contenedor = document.getElementById("contenedor_carga");
         contenedor.style.visibility = "hidden";
         contenedor.style.opacity = '0';
      }
	  </script>
</body>
</html>