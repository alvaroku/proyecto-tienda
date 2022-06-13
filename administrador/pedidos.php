<?php session_start(); 

require '../conexion.php';

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
$sql="select distinct id_us from carrito order by id_us asc";
$resultado=$con->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pedidos</title>
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
	if(isset($_GET['pedidoConfirmado'])){
		if($_GET['pedidoConfirmado']==1){
			echo "<script>
					Swal.fire(
						'Pedido confirmado',
	  					'',
	  					'success')
	  			</script>";
		}else if(empty($_GET['pedidoConfirmado'])){
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
	        <a href="#" class="brand-logo">Pedidos</a> 
	        <?php 
	        if(isset($nombre)){
	          ?>
	          <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
	          <ul class="right hide-on-med-and-down">
	          	<li><a href="readUsuarios.php"><i class="material-icons right">contacts</i>Usuarios</a></li>
	          	<li><a href="CRUD_producto/readProductos.php"><i class="material-icons right">cake</i>Productos</a></li>
	               <li><a href="../logout.php"><i class="material-icons right">exit_to_app</i>Cerrar sesión</a></li>
	               <li><a href="#"><i class="material-icons right">account_circle</i><?php echo $nombre.' '.$apellido ?></a></li>
	          </ul>

	          <?php
	        }else{
	          ?>
	          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
	          <ul class="right hide-on-med-and-down">
	               <li><a href="../formLogin.php">Iniciar sesión</a></li>
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
	    <li><a href="readUsuarios.php"><i class="material-icons left">contacts</i>Usuarios</a></li>
	    <li><a href="CRUD_producto/readProductos.php"><i class="material-icons left">cake</i>Productos</a></li>
	    <li><div class="divider"></div></li>
	    <li><a href="#"><i class="material-icons">account_circle</i>Mi perfil</a></li>
	    <li><a href="../logout.php"><i class="material-icons">exit_to_app</i>Cerrar sesión</a></li>
	  </ul>
	<!--se muestra cuando no está esta logueado en pantallas pequeñas-->
	<ul class="sidenav" id="mobile-demo">
	    <li><a href="../index.php">Inicio</a></li>
	    <li><a href="../signup.html">Registrarse</a></li>
	    <li><a href="../formLogin.php">Iniciar sesión</a></li>
	</ul>

	<div id="contenedor_carga" class="contenedor_carga">
          <div class="carga"></div>
   </div>
	<div class="container">
		<div class="section">
			<div class="row">
				 	
				<?php
				if($resultado->num_rows==0){
				     echo "<h1 class='center'>No hay pedidos para mostrar</h1>";
				}else{
				     //echo $resultado->num_rows;
				?>		
				<?php //recorrer ids de usuarios en la tabla carritos
				     while($row=$resultado->fetch_assoc()){   
				     	$id_us_buscado = $row['id_us'];
				     	//consultar su nombre y apellido
				     	$sql="select nombre,apellido,email from usuarios where id_us = '$id_us_buscado'";
				     	$res=$con->query($sql);
				     	$res = $res->fetch_assoc();
				     	$mailUs = $res['email'];
				     	$nombre = $res['nombre'];
				     	$apellido = $res['apellido'];
				?>
				<div class="row">
						<h4><sup>(<?php echo $id_us_buscado ?>)</sup>Pedido de <?php echo $res['nombre']." ".$res['apellido'] ?></h4>
							 	
				<?php
				//obtener carrito del usuario actual
						$sql="select productos.id_prod, nombre, descripcion, precio, existentes from productos inner join carrito on productos.id_prod=
						carrito.id_prod where carrito.id_us='$id_us_buscado'";
						$res=$con->query($sql);
						echo "Tiene ".$res->num_rows." productos";

						$total = 0;
						//recorrer los productos en carrito de cada usuario
				?>
					
					<table >
						<thead>
							<tr>
								<th>Id</th>
								<th>Nombre</th>
								<th>Descripción</th>
								<th>Precio</th>
								<th>Cantidad</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody>

				<?php 
						while($row=$res->fetch_assoc()){
							$id_prod = $row['id_prod'];
							$sql = "select cantidad from carrito where id_us = '$id_us_buscado' and id_prod='$id_prod'";
							$res_cant = $con->query($sql);
							$res_cant = $res_cant->fetch_assoc();
							?>
							<tr>
								<td><?php echo $id_prod ?></td>
								<td><?php echo $row['nombre'] ?></td>	
								<td>	<?php echo $row['descripcion'] ?></td>	
								<td>$<?php echo $row['precio'] ?>.00</td>
								<td>	<?php echo $res_cant['cantidad'] ?></td>
								<td>
									$<?php echo $res_cant['cantidad']*$row['precio'] ?>.00	
								</td>			
							</tr>
							<?php
							$total+=$res_cant['cantidad']*$row['precio'];
						}//cierra while de carrito
						?> 
							<tr>
								<td><b>Total</b></td>	
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>$<?php echo $total ?>.00</td>	
							</tr>

						</tbody>
					</table>
					<div class="row">
						<div class="section">	</div>
						<form action="confirmarPedido.php" method="post">
							<input name="email" type="hidden" value="<?php echo $mailUs ?>">
							<input name="nombre" type="hidden" value="<?php echo $nombre ?>">
							<input name="apellido" type="hidden" value="<?php echo $apellido ?>">
							<button class="btn blue"><i class="material-icons left">check</i>Confirmar pedido</button>
						</form>
					</div>
				</div>
					<?php
				     }//cierra while de ids_us
				?>
				 
				<?php
				}//cierre else 
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