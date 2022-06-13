<?php 
	session_start();
	$nombre = $_POST['nombre'];
	//echo $nombre;

	$apellido = $_POST['apellido'];
	//echo $apellido;

	$telefono = $_POST['telefono'];
	//echo $telefono;

	$carrera = $_POST['carrera'];
	//echo $carrera;

	$semestre = $_POST['semestre'];
	//echo $semestre;

	$grupo = $_POST['grupo'];
	//echo $grupo;

	$email = $_POST['email'];
	//echo $email;

	$password = $_POST['password'];
	//echo $password;

	include("conexion.php");
	// Consulta segura para evitar inyecciones SQL.
	$sql="insert into usuarios(tipo_us,nombre,apellido,telefono,email,pass,carrera,semestre,grupo) values(2,'$nombre','$apellido','$telefono','$email','$password','$carrera','$semestre','$grupo')";

	if($con->query($sql)===TRUE){
		$sql = "select id_us FROM usuarios WHERE email='$email' AND pass = '$password'";
		$res = $con->query($sql);
		$datos = $res->fetch_assoc();
		
		$_SESSION['id_us'] = $datos['id_us'];
		echo "<script>location.href='productos.php';</script>";
		//header("location:productos.php");
		//echo "nuevo id ".$datos['id'];
	     //header('location:formLogin.html?exito=1');
	}else{
		echo "No se pudo registrar";
	     //header('location:formRegistro.html?exito=0');
	}

?>