<?php
  session_start();
  // Obtengo los datos cargados en el formulario de login.
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  include("conexion.php");
   
  
  // Consulta segura para evitar inyecciones SQL.
  $sql = "SELECT id_us,tipo_us FROM usuarios WHERE email='$email' AND pass = '$password'";
  
  // 
  if($resultado = $con->query($sql)){
  	
    $filas = mysqli_num_rows($resultado);
    //Verificando si el usuario existe en la base de datos.
    if ($filas==0) {
      echo "<script>location.href='formLogin.php?log=5';</script>";
    }else{
      // Guardo en la sesión el id del usuario.
      $datos = $resultado->fetch_assoc();
    	$_SESSION['id_us'] = $datos['id_us'];
      $_SESSION['tipo_us'] = $datos['tipo_us'];

      if($datos['tipo_us']==1){
        echo "<script>location.href='administrador/dashboard.php';</script>"; 
      }else{
        echo "<script>location.href='productos.php';</script>"; 
      }
    }

  }else{
    echo "<script>location.href='formLogin.php?log=6';</script>";
  }

?>