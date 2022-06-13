<?php
session_start();

require 'conexion.php';

$id_us = $_SESSION['id_us'];
$id_prod=$_GET['id_prod'];

$sql="delete from carrito where id_prod = '$id_prod' and id_us='$id_us'";

if($con->query($sql)===TRUE){
	echo "<script>location.href='carrito.php?borrado=1';</script>";
    //header('location:misAnecdotas.php?borrado=1');
}else{
	echo "<script>location.href='carrito.php?borrado=0';</script>";
    //header('location:misAnecdotas.php?borrado=0');
}
?>