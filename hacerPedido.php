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
     $nombre_u = $row['nombre'];
     $apellido = $row['apellido'];
     //$correo = $row['email'];     
} 
$sql="select productos.id_prod, nombre, descripcion, precio, existentes from productos inner join carrito on productos.id_prod=
carrito.id_prod where carrito.id_us='$id_us'";

$resultado=$con->query($sql);

//obtener productos del carrito
$stringProductos = "";
$total = 0;
     while($row=$resultado->fetch_assoc()){  
          

          $id_prod = $row['id_prod'];
          $sql = "select cantidad from carrito where id_us = '$id_us' and id_prod='$id_prod'";
          $res = $con->query($sql);
          $res = $res->fetch_assoc();

          $total+=($res['cantidad']*$row['precio']);
          $nombre = $row['nombre'];
          $desc = $row['descripcion'];
          $precio = $row['precio'];
          $cantidad = $res['cantidad'];
          $subtotal = $res['cantidad']*$row['precio'];

          $stringProductos.= "<tr>
                         <td>$nombre</td>
                         <td>$desc</td>
                         <td>$$precio.00</td>
                         <td>$cantidad</td>
                         <td>$$subtotal.00</td>
                    </tr>";
          //echo $stringProductos;
     }

//$to = "jesus.18070057@itsmotul.edu.mx";
//$to = "alex.18070063@itsmotul.edu.mx";
//$to = "alvaro.18070038@itsmotul.edu.mx";
//datos de envio
$edificio = $_POST['edificio'];
$aula = $_POST['aula'];

$to = "francisco.18070041@itsmotul.edu.mx";
$subject = "Nuevo pedido";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 
$message = "
<!DOCTYPE html>
<html lang='es'>
<head>
     <meta charset='utf-8'>
     <title>Pedido</title>
     <meta name='viewport' content='width=device-width, initial-scale=1.0'>
     <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css'>
</head>
<body>
     <div id='navbar' class='navbar-fixed '>
         <nav>
           <div class='nav-wrapper blue darken-2'>
             <a href='#' class='brand-logo'>Pedido de $nombre_u $apellido </a> 
           </div>
         </nav> 
     </div>
<div class='container'>
          <div class='section'>
               <div class='row'>
                    <h3>Productos($resultado->num_rows)</h3>
                              <table>
                                   <thead>
                                        <tr>
                                             <th>Nombre</th>
                                             <th>Descripción</th>
                                             <th>Precio</th>
                                             <th>Cantidad</th>
                                             <th>Subtotal</th>
                                        </tr>
                                   </thead>

                                   <tbody>
                                        $stringProductos
                                        <tr>
                                             <td><b>Total</b></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td>$$total.00</td>
                                        </tr>
                                   </tbody>
                              </table> 
               </div>
               <div class='row'>
                    <h3>Datos de envio</h3>
                    <table>
                         <thead>
                              <tr>
                                   <th>Edificio</th>
                                   <th>Aula</th>
                              </tr>
                         </thead>
                         <tbody>
                              <tr>
                                   <td>E</td>
                                   <td>3</td>
                              </tr>
                         </tbody>
                    </table>
               </div>
          </div>
</div>
</body>
</html>"
;
echo $message;
if(mail($to, $subject, $message, $headers)){
     echo "<script>location.href='productos.php?pedidoexitoso=1';</script>";
}else{
     echo "<script>location.href='carrito.php?pedidoexitoso=0';</script>";
}
 ?>