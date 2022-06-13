<?php     

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$to = $_POST['email'];
$subject = "Confirmación de Pedido";

$message = 'Estimad@ '.$nombre.' '.$apellido.', te informamos que tu pedido está en camino';

//echo $message;

if(mail($to, $subject, $message)){
     echo "<script>location.href='pedidos.php?pedidoConfirmado=1';</script>";
}else{
     echo "<script>location.href='pedidos.php?pedidoConfirmado=0';</script>";
}

 ?>