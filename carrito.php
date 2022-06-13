<?php session_start(); 

require 'conexion.php';

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
$sql="select productos.id_prod, nombre, descripcion, precio, existentes from productos inner join carrito on productos.id_prod=
carrito.id_prod where carrito.id_us='$id_us'";
$resultado=$con->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Carrito</title>
	<link rel="stylesheet" href="">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <!-- Compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     <!-- sweet alert -->
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="">
	<?php 
	if(isset($_GET['borrado'])){
		if($_GET['borrado']==1){
			echo "<script>
					Swal.fire(
						'Producto eliminado',
	  					'',
	  					'success')
	  			</script>";
		}else if(empty($_GET['borrado'])){
			echo "<script>
					Swal.fire({
				  	icon: 'error',
				  	title: 'Oops...',
				  	text: 'Algo salió mal!'
					})
				</script>";
		}
	}
	 ?>
	 <?php 
	if(isset($_GET['pedidoexitoso'])){
		if(empty($_GET['pedidoexitoso'])){
			echo "<script>
					Swal.fire({
				  	icon: 'error',
				  	title: 'Oops...',
				  	text: 'Algo salió mal!'
					})
				</script>";
		}
	}
	 ?>
	<div id="navbar" class="navbar-fixed ">
	    <nav class=" ">
	      <div class="nav-wrapper blue darken-2">
	        <a href="#" class="brand-logo">Carrito</a> 
	        <?php 
	        if(isset($nombre)){
	          ?>
	          <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
	          <ul class="right hide-on-med-and-down">
	               <li><a href="productos.php"><i class="material-icons right">home</i>Productos</a></li>
	               <li><a href="logout.php"><i class="material-icons right">exit_to_app</i>Cerrar sesión</a></li>
	               <li><a href="#"><i class="material-icons right">account_circle</i><?php echo $nombre.' '.$apellido ?></a></li>
	          </ul>

	          <?php
	        }else{
	          ?>
	          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
	          <ul class="right hide-on-med-and-down">
	               <li><a href="../login.html">Iniciar sesión</a></li>
	               <li><a href="../signup.html">Registrarse</a></li>
	               <li><a href="#"><i class="material-icons right">account_circle</i>Invitado</a></li>
	          </ul>

	         <?php
	        }
	         ?>
	      </div>
	    </nav> 
	</div>

	<!--se muestra cuando esta logueado en pantallas pequeñas-->
	<ul id="slide-out" class="sidenav">
	    <li><div class="user-view">
	      <div class="background">
	        <img src="https://image.freepik.com/foto-gratis/textura-pared-estuco-azul-marino-relieve-decorativo-abstracto-grunge-fondo-color-rugoso-gran-angular_1258-28311.jpg">
	      </div>
	      <a href="#user"><img class="circle" src="https://cdn.pixabay.com/photo/2019/08/11/18/59/icon-4399701_960_720.png"></a>
	      <a href="#name"><span class="white-text name"><?php echo $nombre.' '.$apellido ?></span></a>
	      <a href="#email"><span class="white-text email"><?php echo $correo ?></span></a>
	    </div></li>
	    <li><a href="productos.php"><i class="material-icons left">home</i>Productos</a></li>
	    <li><div class="divider"></div></li>
	    <li><a href="#"><i class="material-icons">account_circle</i>Mi perfil</a></li>
	    <li><a href="logout.php"><i class="material-icons">exit_to_app</i>Cerrar sesión</a></li>
	  </ul>
	<!--se muestra cuando no está esta logueado en pantallas pequeñas-->
	<ul class="sidenav" id="mobile-demo">
	    <li><a href="../index.html">Inicio</a></li>
	    <li><a href="../signup.html">Registrarse</a></li>
	    <li><a href="../login.html">Iniciar sesión</a></li>
	</ul>

	<div id="contenedor_carga" class="contenedor_carga">
          <div class="carga"></div>
   </div>
	<div class="container">
		<div class="section">
			<div class="row">
				 	
				<?php
				if($resultado->num_rows==0){
				     echo "<h1 class='center'>No hay productos en carrito</h1>";
				}else{
				     //echo $resultado->num_rows;
				?>
				<h3>Carrito de compras(<?php echo $resultado->num_rows ?>)</h3>
						<table class="responsive-table">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Descripción</th>
									<th>Precio</th>
									<th>Cantidad</th>
									<th>Subtotal</th>
									<th>Eliminar</th>
								</tr>
							</thead>
							<tbody>
						
				<?php 
				$total = 0;
				     while($row=$resultado->fetch_assoc()){  
				     	

				     	$id_prod = $row['id_prod'];
				     	$sql = "select cantidad from carrito where id_us = '$id_us' and id_prod='$id_prod'";
				     	$res = $con->query($sql);
				     	$res = $res->fetch_assoc();

				     	$total+=($res['cantidad']*$row['precio']);
				     	
				     	
				?>
							
								<tr>
									<td><?php echo $row['nombre'] ?></td>
									<td><?php echo $row['descripcion'] ?></td>
									<td>$<?php echo $row['precio']?>.00</td>
									<td><?php echo $res['cantidad'] ?></td>
									<td>$<?php echo $res['cantidad']*$row['precio'] ?>.00</td>
									<td>
										<a class="btn red" href="eliminarCarrito.php?id_prod=<?php echo $row['id_prod'] ?>"><i class="material-icons">delete</i></a>
									</td>
								</tr>
				<?php
				     }   
				?>
								<tr>
									<td><b>Total</b></td>
									<td></td>
									<td></td>
									<td></td>
									<td><b>$<?php echo $total ?>.00</b></td>
								</tr>
						</tbody>
				     </table>
				     
				     <div class="row">
				     	<div class="section"></div>
				     	<!-- Modal Trigger -->
				     	 <button data-target="modal1" class="btn modal-trigger blue">Terminar compra</button>
				     </div>
				<?php
				}       
				?>
			</div>
		</div>
	</div>
	  
	   <!-- Modal Structure -->
	   <div id="modal1" class="modal">
	   	<form action="hacerPedido.php" method="post">
		     <div class="modal-content">
		       <h4>Datos de envio</h4>
		       <div class="row">
		               <div class="input-field col s12">
		                 <input id="edificio" name="edificio" type="text" class="validate" required>
		                 <label for="edificio">Edificio</label>
		                 <span class="helper-text" data-error="Completar campo" data-success="Bien"></span>
		               </div>
		               <div class="input-field col s12">
		                 <input id="aula" type="text" name="aula" class="validate" required>
		                 <label for="aula">Aula</label>
		                 <span class="helper-text" data-error="Completar campo" data-success="Bien"></span>
		               </div>
		       </div>
		     </div>
		     <div class="modal-footer">
		     	<a href="#!" class="modal-close waves-effect waves-red btn-flat">Cancelar</a>
		       	<button href="#!" class=" waves-effect waves-green btn blue">Terminar</button>
		     </div>
		</form>
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