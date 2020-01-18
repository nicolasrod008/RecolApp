<?php
session_start();
require_once ("../conexiones/conexion.php");
$con=conectar();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Actualizar Usuarios</title>
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
          <li><a href="../tipo/select.php">Tipo</a></li>
          <li><a href="select.php">Usuario</a></li>
        </ul>
      </nav>
 
<?php 
   if(isset($_GET['actualizar'])){
   $editar_id = $_GET['actualizar'];

   $consulta="SELECT  *, r.IdRol as idr, r.Nombre as rnom, u.Nombre as nom FROM  usuario u, rol r WHERE u.IdUsuario=$editar_id and u.IdRol=r.IdRol";
   $ejecutar=$con->query($consulta);

   $Fila=$ejecutar->fetch_assoc();
        $idusuario=$Fila['IdUsuario']; 
        $idrol=$Fila['IdRol']; 
        $nom=$Fila['nom'];
        $apellido=$Fila['Apellido']; 
        $direccion=$Fila['Direccion'];
        $documento=$Fila['Documento'];
        $telefono=$Fila['Telefono'];
        $email=$Fila['Email'];
        $clave=$Fila['Contrasena'];

        $idrol=$Fila['idr'];
        $nombrer=$Fila['rnom'];


   }

 ?>
  <form method="POST" action="">
  <table align="center" border="0">

      <tr>
     <td><h3>Rol:</h3></td>
     <td><select name="selectRol">
      <option value="<?php echo $idrol;?>"><?php echo $nombrer;?></option>
      <?php
       $sql="select * from rol";  
       $ejecutar = $con->query($sql);
       while ($res=$ejecutar->fetch_assoc()) {
        echo "<option value = '".$res['IdRol']."'>".$res['Nombre']."</option>";
       }

      ?>
  </select></td>
      </tr>

    <tr>
    <td><h3>Nombre:</h3></td>
    <td><input type="text" name="txtNombre" value="<?php echo $nom;?>"></td>
  </tr>
    

  <tr>
    <td><h3>Apellidos:</h3></td>
    <td><input type="text" name="txtApellido" value="<?php echo $apellido;?>"></td>
  </tr>

  <tr>
    <td><h3>Documento:</h3></td>
    <td><input type="text" name="txtDocumento" value="<?php echo $documento;?>" ></td>
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
   <tr>
    <td><h3>Contraseña:</h3></td>
    <td><input type="password" name="txtClave" value="<?php echo $clave;?>"></td>
  </tr>

            <tr><td><input type="submit" name="actualizar" value="ACTUALIZAR"></td>
            </tr>
        

  </table>
</form>


<?php
if (isset($_POST['actualizar']))
 {  

  $rol=$_POST['selectRol'];
  $nom=$_POST['txtNombre'];
  $ape=$_POST['txtApellido'];
  $doc=$_POST['txtDocumento'];
  $dir=$_POST['txtDireccion'];
  $tel=$_POST['txtTelefono'];
  $ema=$_POST['txtEmail'];
  $cla=$_POST['txtClave'];

  $actualizar="UPDATE  usuario  SET IdRol='$rol', Nombre='$nom', Apellido='$ape', Direccion='$dir', Documento='$doc', Telefono='$tel', Email='$ema', Contrasena='$cla' WHERE IdUsuario='$editar_id'";
  $ejecutar=$con->query($actualizar);

  echo "<script>alert('Datos  Actualizados')</script>";
  echo "<script>window.open('select.php','_self')</script>";
}

?>
</body>
</html>