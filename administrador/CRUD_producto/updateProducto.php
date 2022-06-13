<?php
require '../../conexion.php';

$id_prod = $_POST['id'];

$nombre = $_POST['nombre'];
     //echo $nombre;

$descripcion = $_POST['descripcion'];
     //echo $descripcion;

$precio = $_POST['precio'];
     //echo $precio;

$existentes = $_POST['existentes'];

$sql="update productos set nombre='$nombre', descripcion='$descripcion', precio='$precio', existentes='$existentes' where id_prod=$id_prod";

if($con->query($sql)===TRUE){
     echo "<script>location.href='readProductos.php?actualizado=1';</script>";
     //header('location:readProductos.php?actualizado=1');
}else{
     echo "<script>location.href='readProductos.php?actualizado=0';</script>";
}
?>