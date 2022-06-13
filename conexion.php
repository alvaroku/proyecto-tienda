 <?php
//conexión a DB
$servidor='localhost';
$user='root';
$contra='2305';
$db = "db_proyecto";
$con=new mysqli($servidor,$user,$contra,$db);

if ($con->connect_error){
     die('conexión fallida: '.$con->connect_error);
}
?>