<?php
session_start();
require_once ("../conexiones/conexion.php");
$con=conectar();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Actualizar Empresa Recolectora</title>
</head>

<body>

<nav>
        <ul >
          <li ><a href="../Arbol/select.php">Arbol</a> </li>
          <li><a href="../Convenio/select.php">Convenio</a></li>
          <li><a href="../EmpresaGeneradora/select.php">Empresa Generadora</a></li>
          <li><a href="select.php">Empresa Recolectora</a></li>
          <li><a href="../EntregaResiduo/select.php">Entreaga Residuo</a> </li>
          <li><a href="../residuo/select.php">Residuo</a></li>
          <li><a href="../tipo/select.php">Tipo</a></li>
          <li><a href="../usuario/select.php">Usuario</a></li>
        </ul>
      </nav>
 
<?php 
   if(isset($_GET['actualizar'])){
   $editar_id = $_GET['actualizar'];

   $consulta="SELECT  * FROM  empresarecolectora WHERE IdEmpresaRecolectora='$editar_id'";
   $ejecutar=$con->query($consulta);

   $Fila=$ejecutar->fetch_assoc();
         $idempresa=$Fila['IdEmpresaRecolectora']; 
        $nombre=$Fila['Nombre'];
        $direccion=$Fila['Direccion']; 
        $telefono=$Fila['Telefono'];
        $email=$Fila['Email'];

   }

 ?>
  <form method="POST" action="">
  <table align="center" border="0">


    <tr>
    <td><h3>Nombre:</h3></td>
    <td><input type="text" name="txtNombre" value="<?php echo $nombre;?>"></td>
  </tr>
    

  <tr>
    <td><h3>Direccion:</h3></td>
    <td><input type="text" name="txtDireccion" value="<?php echo $direccion;?>"></td>
  </tr>

  <tr>
    <td><h3>Telefono:</h3></td>
    <td><input type="text" name="txtTelefono" value="<?php echo $telefono;?>" ></td>
  </tr>

  <tr>
    <td><h3>Email:</h3></td>
    <td><input type="text" name="txtEmail" value="<?php echo $email;?>"></td>
  </tr>

            <tr><td><input type="submit" name="actualizar" value="ACTUALIZAR"></td>
            </tr>
        

  </table>
</form>


<?php
if (isset($_POST['actualizar']))
 {  

  $nombree=$_POST['txtNombre'];
  $direc=$_POST['txtDireccion'];
  $tel=$_POST['txtTelefono'];
  $eemail=$_POST['txtEmail'];

  $actualizar="UPDATE  empresarecolectora  SET  Nombre='$nombree', Direccion='$direc', Telefono='$tel', Email='$eemail' WHERE IdEmpresaRecolectora='$editar_id'";
  $ejecutar=$con->query($actualizar);

  echo "<script>alert('Datos  Actualizados')</script>";
  echo "<script>window.open('select.php','_self')</script>";
}

?>
</body>
</html>