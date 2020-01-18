<?php
session_start();
require_once ("../conexiones/conexion.php");
$con=conectar();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
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

  <form name="form" action="insert.php" method="post">
  <br><br><br><br><br><br><br>
  <h3>Insertar Entrega Residuo</h3><br><br>
<table align="center" width="80%">


   <tr>
     <td><h3>Rol:</h3></td>
     <td><select name="selectRol">
      <option value="0">--</option>
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
    <td><input type="text" name="txtNombre" ></td>
  </tr>

   <tr>
    <td><h3>Apellido:</h3></td>
    <td><input type="text" name="txtApellido" ></td>
  </tr>

   <tr>
    <td><h3>Direccion:</h3></td>
    <td><input type="text" name="txtDireccion" ></td>
  </tr>

  <tr>
    <td><h3>Documento:</h3></td>
    <td><input type="text" name="txtDocumento" ></td>
  </tr>

  <tr>
    <td><h3>Telfono:</h3></td>
    <td><input type="text" name="txtTelfono" ></td>
  </tr>

  <tr>
    <td><h3>Email:</h3></td>
    <td><input type="text" name="txtEmail" ></td>
  </tr>

   <tr>
    <td><h3>Contraseña:</h3></td>
    <td><input type="password" name="txtContrasena" ></td>
  </tr>
       

      </table>


<?php

  if(isset($_POST['Enviar'])){
      $sql='insert into usuario(IdRol,Nombre,Apellido,Direccion,Documento,Telefono,Email,Contrasena) values("'.$_POST['selectRol'].'","'.$_POST['txtNombre'].'","'.$_POST['txtApellido'].'","'.$_POST['txtDireccion'].'","'.$_POST['txtDocumento'].'","'.$_POST['txtTelfono'].'","'.$_POST['txtEmail'].'","'.$_POST['txtContrasena'].'")';
    $result = $con->query($sql);
  
    if($result)
      {
      echo "<script> alert('Registro Insertado')</script>";
      }
    else
        {
      echo "<script> alert('Error al Insertar')</script>";
        }
  }

  ?>

    <br><br><br>
  <input type="submit" name="Enviar" value="Insertar">
  <br><center><a href="select.php" style="color:black;"><h5><b>VER</b></h5></a></center><br>
</form>


</body>
</html>