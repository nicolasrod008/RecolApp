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
          <li><a href="select.php">Tipo</a></li>
          <li><a href="../usuario/select.php">Usuario</a></li>
        </ul>
      </nav>

  <form name="form" action="insert.php" method="post">
  <br><br><br><br><br><br><br>
  <h3>Insertar Entrega Residuo</h3><br><br>
<table align="center" width="80%">

   <tr>
    <td><h3>Nombre:</h3></td>
    <td><input type="text" name="txtNombre" ></td>
  </tr>

       

      </table>


<?php

  if(isset($_POST['Enviar'])){
      $sql='insert into tipo(Nombre) values("'.$_POST['txtNombre'].'")';
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
  <br><center><a href="selectB.php" style="color:black;"><h5><b>VER</b></h5></a></center><br>
</form>


</body>
</html>