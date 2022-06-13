<?php 
	session_start();
	$nombre = $_POST['nombre'];
	//echo $nombre;

	$descripcion = $_POST['descripcion'];
	//echo $descripcion;

	$precio = $_POST['precio'];
	//echo $precio;

	$existentes = $_POST['existentes'];
	//echo $existentes;


	include("../../conexion.php");

	// Consulta segura para evitar inyecciones SQL.

	$sql="insert into productos(nombre,descripcion,precio,existentes) values('$nombre','$descripcion','$precio','$existentes')";

	if($con->query($sql)===TRUE){
		 
		echo "<script>location.href='readProductos.php?agregado=1';</script>";
		//header("location:productos.php");
		//echo "nuevo id ".$datos['id'];
	     //header('location:formLogin.html?exito=1');
	}else{
		echo "<script>location.href='readProductos.php?agregado=0';</script>";
	     //header('location:formRegistro.html?exito=0');
	}

?>