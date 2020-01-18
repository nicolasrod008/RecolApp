<?php
session_start();
require_once ("../conexiones/conexion.php");
$con=conectar();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Actualizar Tipo de Residuo</title>
</head>

<body>

 <nav>
        <ul >
          <li ><a href="../Arbol/select.php">Arbol</a> </li>
          <li><a href="../Convenio/select.php">Convenio</a></li>
          <li><a href="../EmpresaGeneradora/select.php">Empresa Generadora</a></li>
          <li><a href="../EmpresaRecolectora/select.php">Empresa Recolectora</a></li>
          <li><a href="../EntregaResiduo/select.php">Entreaga Residuo</a> </li>
          <li><a href="../residuo/select.php">Residuo</a></li>
          <li><a href="select.php">Tipo</a></li>
          <li><a href="../usuario/select.php">Usuario</a></li>
        </ul>
      </nav>
 
<?php 
   if(isset($_GET['actualizar'])){
   $editar_id = $_GET['actualizar'];

   $consulta="SELECT  * FROM  tipo WHERE IdTipo='$editar_id'";
   $ejecutar=$con->query($consulta);

   $Fila=$ejecutar->fetch_assoc();
        $idresiduo=$Fila['IdTipo']; 
        $nom=$Fila['Nombre']; 

   }

 ?>
  <form method="POST" action="">
  <table align="center" border="0">

 

    <tr>
    <td><h3>Nombre:</h3></td>
    <td><input type="text" name="txtNombre" value="<?php echo $nom;?>"></td>
  </tr>

            <tr><td><input type="submit" name="actualizar" value="ACTUALIZAR"></td>
            </tr>
        

  </table>
</form>


<?php
if (isset($_POST['actualizar']))
 {  

  $nombre=$_POST['txtNombre'];

  $actualizar="UPDATE  tipo  SET Nombre='$nombre' WHERE IdTipo='$editar_id'";
  $ejecutar=$con->query($actualizar);

  echo "<script>alert('Datos  Actualizados')</script>";
  echo "<script>window.open('select.php','_self')</script>";
}

?>
</body>
</html>