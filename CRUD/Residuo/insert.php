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
          <li><a href="select.php">Residuo</a></li>
          <li><a href="../tipo/select.php">Tipo</a></li>
          <li><a href="../usuario/select.php">Usuario</a></li>
        </ul>
      </nav>

  <form name="form" action="insert.php" method="post">
  <br><br><br><br><br><br><br>
  <h3>Insertar Entrega Residuo</h3><br><br>
<table align="center" width="80%">

  <tr>
     <td><h3>Numero de entrega del residuo:</h3></td>
     <td><select name="selectEntrega">
      <option value="0">--</option>
      <?php
       $sql="select * from EntregaResiduo";  
       $ejecutar = $con->query($sql);
       while ($res=$ejecutar->fetch_assoc()) {
        echo "<option value = '".$res['IdEntregaResiduo']."'>".$res['IdEntregaResiduo']."</option>";
       }

      ?>
  </select></td>
      </tr>
 

  <tr>
     <td><h3>Numero del convenio en el cual se gestiono el residuo:</h3></td>
     <td><select name="selectConvenio">
      <option value="0">--</option>
      <?php
       $sql="select * from Convenio";  
       $ejecutar = $con->query($sql);
       while ($res=$ejecutar->fetch_assoc()) {
        echo "<option value = '".$res['IdConvenio']."'>".$res['IdConvenio']."</option>";
       }

      ?>
  </select></td>
      </tr>

  <tr>
     <td><h3>Tipo de residuo:</h3></td>
     <td><select name="selectTipo">
      <option value="0">--</option>
      <?php
       $sql="select * from tipo";  
       $ejecutar = $con->query($sql);
       while ($res=$ejecutar->fetch_assoc()) {
        echo "<option value = '".$res['IdTipo']."'>".$res['Nombre']."</option>";
       }

      ?>
  </select></td>
      </tr>

   <tr>
    <td><h3>Peso Aproximado:</h3></td>
    <td><input type="text" name="txtPeso" ></td>
  </tr>

       

      </table>


<?php

  if(isset($_POST['Enviar'])){
      $sql='insert into residuo(IdEntregaResiduo,IdConvenio,IdTipo,PesoAproximado) values("'.$_POST['selectEntrega'].'","'.$_POST['selectConvenio'].'","'.$_POST['selectTipo'].'","'.$_POST['txtPeso'].'")';
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