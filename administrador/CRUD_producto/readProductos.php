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
$sql="select * from productos";
$resultado=$con->query($sql);
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
				  	text: 'Error al borrar!'
					})
				</script>";
		}
	}
	 ?>
	 <?php 
	if(isset($_GET['actualizado'])){
		if($_GET['actualizado']==1){
			echo "<script>
					Swal.fire(
						'Producto actualizado',
	  					'',
	  					'success')
	  			</script>";
		}else if(empty($_GET['actualizado'])){
			echo "<script>
					Swal.fire({
				  	icon: 'error',
				  	title: 'Oops...',
				  	text: 'Error al actualizar!'
					})
				</script>";
		}
	}
	 ?>
	 <?php 
	if(isset($_GET['agregado'])){
		if($_GET['agregado']==1){
			echo "<script>
					Swal.fire(
						'Producto agregado',
	  					'',
	  					'success')
	  			</script>";
		}else if(empty($_GET['agregado'])){
			echo "<script>
					Swal.fire({
				  	icon: 'error',
				  	title: 'Oops...',
				  	text: 'Error al agregar!'
					})
				</script>";
		}
	}
	 ?>
	<div id="navbar" class="navbar-fixed ">
	    <nav class=" ">
	      <div class="nav-wrapper blue darken-2">
	        <a href="#" class="brand-logo">Productos</a> 
	        <?php 
	        if(isset($nombre)){
	          ?>
	          <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
	          <ul class="right hide-on-med-and-down">
	          	<li><a href="../readUsuarios.php"><i class="material-icons right">contacts</i>Usuarios</a></li>
	          	<li><a href="../pedidos.php"><i class="material-icons right">card_giftcard</i>Pedidos</a></li>
	               <li><a href="formCreateProducto.php"><i class="material-icons right">add</i>Agregar producto</a></li>
	               <li><a href="../../logout.php"><i class="material-icons right">exit_to_app</i>Cerrar sesión</a></li>
	               <li><a href="#"><i class="material-icons right">account_circle</i><?php echo $nombre.' '.$apellido ?></a></li>
	          </ul>

	          <?php
	        }else{
	          ?>
	          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
	          <ul class="right hide-on-med-and-down">
	               <li><a href="../../formLogin.php">Iniciar sesión</a></li>
	               <li><a href="../../signup.html">Registrarse</a></li>
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
	    <li><a href="formCreateProducto.php"><i class="material-icons left">add</i>Agregar producto</a></li>
	    <li><div class="divider"></div></li>
	    <li><a href="../readUsuarios.php"><i class="material-icons left">contacts</i>Usuarios</a></li>
	    <li><a href="../pedidos.php"><i class="material-icons left">card_giftcard</i>Pedidos</a></li>
	    <li><div class="divider"></div></li>
	    <li><a href="#"><i class="material-icons">account_circle</i>Mi perfil</a></li>
	    <li><a href="../../logout.php"><i class="material-icons">exit_to_app</i>Cerrar sesión</a></li>
	  </ul>
	<!--se muestra cuando no está esta logueado en pantallas pequeñas-->
	<ul class="sidenav" id="mobile-demo">
	    <li><a href="../../index.php">Inicio</a></li>
	    <li><a href="../../signup.html">Registrarse</a></li>
	    <li><a href="../../formLogin.php">Iniciar sesión</a></li>
	</ul>

	<div id="contenedor_carga" class="contenedor_carga">
          <div class="carga"></div>
   </div>
	<div class="container">
		<div class="section">
			<div class="row">
				 	
				<?php
				if($resultado->num_rows==0){
				     echo "<tr><td><h1 class='center'>No hay productos para mostrar</h1></td></tr>";
				}else{
				     //echo $resultado->num_rows;
				?>
						<table >
							<thead>
								<tr>
									<th>ID</th>
									<th>Nombre</th>
									<th>Precio</th>
									<th>Disponibles</th>
									<th>Descripción</th>
									<th>Editar</th>
									<th>Eliminar</th>
								</tr>
							</thead>
						
				<?php 
				     while($row=$resultado->fetch_assoc()){   
				?>
							<tbody>
								<tr>
									<td><?php echo $row['id_prod'] ?></td>
									<td><?php echo $row['nombre'] ?></td>
									<td><?php echo $row['precio'] ?></td>
									<td><?php echo $row['existentes'] ?></td>
									<td><?php echo $row['descripcion'] ?></td>
									<td>
										<a class="btn blue" href="formUpdateProducto.php?id_prod=<?php echo $row['id_prod'] ?>"><i class="material-icons">edit</i></a>
									</td>
									<td>
										<a class="btn red" href="deleteProducto.php?id_prod=<?php echo $row['id_prod'] ?>"><i class="material-icons">delete</i></a>
									</td>
								</tr>
							</tbody>		
				<?php
				     }
				?>
				     </table>
				<?php
				}       
				?>
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