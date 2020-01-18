  <?php

session_start();
require_once ("../conexiones/conexion.php");
$con=conectar();



if(isset($_GET['eliminar'])){
  $borrar_id = $_GET['eliminar'];
  $eliminar = "DELETE  FROM  tipo  WHERE  IdTipo='$borrar_id'";
  $ejecutar = $con->query($eliminar);


  if($ejecutar){
     echo "<script>alert('el tipo de residuo se elimino correctamente')</script>";
     echo "<script>window.open('select.php','_self')</script>";
  
 }
 }
?>