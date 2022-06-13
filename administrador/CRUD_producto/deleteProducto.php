<?php
require '../../conexion.php';

$id_prod=$_GET['id_prod'];

$sql="delete from productos where id_prod = '$id_prod'";

if($con->query($sql)===TRUE){
	echo "<script>location.href='readProductos.php?borrado=1';</script>";
    //header('location:misAnecdotas.php?borrado=1');
}else{
	//echo $id_prod;
	echo "<script>location.href='readProductos.php?borrado=0';</script>";
    //header('location:misAnecdotas.php?borrado=0');
}
?>