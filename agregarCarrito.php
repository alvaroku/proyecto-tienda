
<?php 
	session_start();
	
	$id_us = $_POST['id_us'];

	$id_prod = $_POST['id_prod'];

	$cantidad = $_POST['cantidad'];

	//echo 'usuario '.$id_us.' producto '.$id_prod.' cantidad '.$cantidad;

	require("conexion.php");

	//verificar si existe en el carrito el producto
	$sql = "select*from carrito where id_us = '$id_us' and id_prod = '$id_prod'";
	$buscado = $con->query($sql);
	//cuando no existe entonces se inserta
	//echo "registros".$buscado->num_rows;
	if($buscado->num_rows==0){
		$sql = "insert into carrito(id_us,id_prod,cantidad)values('$id_us','$id_prod','$cantidad')";
	//si no, se actualiza	
	}else{
		$sql = "update carrito set cantidad = '$cantidad' where id_us = '$id_us' and id_prod = '$id_prod'";
	}
	
	

	if($res = $con->query($sql)===TRUE){
		echo "<script>location.href='productos.php?agregado=1';</script>";
	}else{
		echo "<script>location.href='productos.php?agregado=0';</script>";
	}

 ?>