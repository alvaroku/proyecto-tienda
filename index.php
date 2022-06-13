
<?php 

		session_start();	
		if(isset($_SESSION['tipo_us']) && !empty($_SESSION['tipo_us'])){
			if($_SESSION['tipo_us']==1){
				echo "<script>location.href='administrador/dashboard.php';</script>"; 
			}else{
				echo "<script>location.href='productos.php';</script>"; 
			}
			
			//echo $_SESSION['id_us'];
		} else{
			//echo 'No hay sesion';
		}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Inicio</title>
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
<body class="grey darken-4 ">

	 

	<div class="navbar-fixed ">
		<nav class="">
		    <div class="nav-wrapper light-blue darken-3">
		      <a href="#!" class="brand-logo">Coffee shop</a>
		      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
		      <ul class="right hide-on-med-and-down">
		        <li><a href="signup.html"><i class="material-icons right">description</i>Registrarse</a></li>
		        <li><a href="formLogin.php"><i class="material-icons right">arrow_forward</i>Iniciar Sesión</a></li>
		        <li><a href="productos.php"><i class="material-icons right">cake</i>Ver Productos</a></li>
		      </ul>
		    </div>
		</nav>
	</div>
	
	<ul class="sidenav" id="mobile-demo">
		  <li><a href="productos.php"><i class="material-icons">cake</i>Productos</a></li>
	    <li><a href="signup.html"><i class="material-icons">description</i>Registro</a></li>
	    <li><a href="formLogin.php"><i class="material-icons">arrow_forward</i>Iniciar Sesión</a></li>
	</ul>

	<div id="contenedor_carga" class="contenedor_carga">
          <div class="carga"></div>
   </div>

	 <main class="valign-wrapper">
    	<span class="container grey-text text-lighten-1 ">
    		<p class="flow-text">Bienvenido a Coffe Shop</p>
     		<h1 class="title grey-text text-lighten-3">Web para pedidos</h1>
     		<blockquote class="flow-text">Una página para hacer pedidos de productos de la cafeteria.</blockquote>
     	</span>
    </main>

    <div class="fixed-action-btn">
    	<a href="#message" class="modal-trigger btn btn-large btn-floating amber waves-effect waves-light">
    		<i class="large material-icons">message</i>
    	</a>
    </div>

    <div id="message" class="modal modal-fixed-footer">
    	<div class="modal-content">
    		<h4>Contact</h4>
    		<p>coming soon...</p>
    	</div>
    	<div class="modal-footer">
    		<a href="#" class="modal-action modal-close waves-effect btn-flat">close</a>
    	</div> 
    </div>
	

	<footer class="page-footer light-blue darken-3">
	    <div class="container">
	      <div class="row">
		        <div class="col l6 s12">
		          <h5 class="white-text">Información</h5>
		          <p class="grey-text text-lighten-4">7°A ISC</p>
		        </div>
		        <div class="col l4 offset-l2 s12">
		          <h5 class="white-text">Desarrollado por:</h5>
		          <ul>
		            <li><a class="grey-text text-lighten-3" href="#!">Franciso Mac</a></li>
		            <li><a class="grey-text text-lighten-3" href="#!">Alvaro Kú</a></li>
		            <li><a class="grey-text text-lighten-3" href="#!">Alex Xul</a></li>
		            <li><a class="grey-text text-lighten-3" href="#!">Ezequiel Tun</a></li>
		            <li><a class="grey-text text-lighten-3" href="#!">Ricardo Can</a></li>
		          </ul>
		        </div>
	      </div>
	    </div>
		    <div class="footer-copyright">
		      <div class="container">
		              © 2021 Copyright Text
		      <a class="grey-text text-lighten-4 right" href="#!">TecMotul</a>
		      </div>
		    </div>
	</footer>
	<style>
		main{
			min-height: 100vh;
		}
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